<?php

namespace YukataRm\Laravel\Resource\Commands;

use YukataRm\Laravel\Command\BaseCommand;

use YukataRm\Text\Proxies\Text;

use YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\ConductorInterface;
use YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\MultiTypeConductorInterface;

use YukataRm\Laravel\Resource\Commands\Conductors\ControllerConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\ModelConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\RepositoryConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\RepositoryEntityConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\RequestConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\RequestEntityConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\ServiceConductor;
use YukataRm\Laravel\Resource\Commands\Conductors\ViewConductor;

use YukataRm\Laravel\Db\Commands\Migration\CreateCommand;

use Illuminate\Support\Str;

/**
 * Resource Command
 *
 * @package YukataRm\Laravel\Resource\Commands
 */
class ResourceCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "resource {target} {--directory=*} {--force}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create All resources";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * target name
     *
     * @var string
     */
    protected string $target;

    /**
     * directory
     *
     * @var array<string>
     */
    protected array $directory;

    /**
     * make file force
     *
     * @var bool
     */
    protected bool $force;

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void
    {
        $this->target = Text::toSnake($this->argument("target"));

        $this->directory = $this->option("directory") ?? [];
        $this->force     = $this->option("force") ?? false;
    }

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * run command process
     *
     * @return array<mixed>
     */
    protected function process(): array
    {
        $this->conductControllerResource();
        $this->conductModelResource();
        $this->conductRepositoryResource();
        $this->conductRepositoryEntityResource();
        $this->conductRequestResource();
        $this->conductRequestEntityResource();
        $this->conductServiceResource();
        $this->conductViewResource();

        $this->createMigration();

        $this->outputInfo(sprintf("[%s] resource created successfully.", $this->target));

        return [];
    }

    /*----------------------------------------*
     * Conduct - Execute
     *----------------------------------------*/

    /**
     * execute conductor
     *
     * @param \YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\ConductorInterface $conductor
     * @return void
     */
    protected function executeConductor(ConductorInterface $conductor): void
    {
        $conductor->setCommandArguments($this->target, $this->directory, $this->force);

        $result = $conductor->conduct();

        $this->handleConductResult($result);
    }

    /**
     * execute multi type conductor
     *
     * @param \YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\MultiTypeConductorInterface $conductor
     * @return void
     */
    protected function executeMultiTypeConductor(MultiTypeConductorInterface $conductor): void
    {
        $conductor->setCommandArguments($this->target, $this->directory, $this->force);

        foreach ($conductor->conducts() as $result) {
            $this->handleConductResult($result);
        }
    }

    /**
     * handle conduct result
     *
     * @param string $result
     * @return void
     */
    protected function handleConductResult(string $result): void
    {
        $this->outputInfo(sprintf("[%s] created successfully.", $result));
    }

    /*----------------------------------------*
     * Conduct - Resource
     *----------------------------------------*/

    /**
     * execute controller conductor
     *
     * @return void
     */
    protected function conductControllerResource(): void
    {
        $conductor = new ControllerConductor();

        $this->executeConductor($conductor);
    }

    /**
     * execute model conductor
     *
     * @return void
     */
    protected function conductModelResource(): void
    {
        $conductor = new ModelConductor();

        $this->executeConductor($conductor);
    }

    /**
     * execute repository conductor
     *
     * @return void
     */
    protected function conductRepositoryResource(): void
    {
        $conductor = new RepositoryConductor();

        $this->executeConductor($conductor);
    }

    /**
     * execute repository entity conductor
     *
     * @return void
     */
    protected function conductRepositoryEntityResource(): void
    {
        $conductor = new RepositoryEntityConductor();

        $this->executeConductor($conductor);
    }

    /**
     * execute request conductor
     *
     * @return void
     */
    protected function conductRequestResource(): void
    {
        $conductor = new RequestConductor();

        $this->executeMultiTypeConductor($conductor);
    }

    /**
     * execute request entity conductor
     *
     * @return void
     */
    protected function conductRequestEntityResource(): void
    {
        $conductor = new RequestEntityConductor();

        $this->executeMultiTypeConductor($conductor);
    }

    /**
     * execute service conductor
     *
     * @return void
     */
    protected function conductServiceResource(): void
    {
        $conductor = new ServiceConductor();

        $this->executeMultiTypeConductor($conductor);
    }

    /**
     * execute view conductor
     *
     * @return void
     */
    protected function conductViewResource(): void
    {
        $conductor = new ViewConductor();

        $this->executeMultiTypeConductor($conductor);
    }

    /*----------------------------------------*
     * Migration
     *----------------------------------------*/

    /**
     * create migration
     *
     * @return void
     */
    protected function createMigration(): void
    {
        $this->call(CreateCommand::class, [
            "table" => $this->tableName(),
        ]);
    }

    /**
     * get table name
     *
     * @return string
     */
    protected function tableName(): string
    {
        return implode("_", array_map(
            fn($directory) => strtolower($directory),
            array_merge($this->directory, [Str::plural($this->target)])
        ));
    }
}
