<?php

namespace YukataRm\Laravel\Resource;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use YukataRm\Laravel\Resource\Commands\ResourceCommand;

/**
 * Resource Service Provider
 *
 * @package YukataRm\Laravel\Resource
 */
class ServiceProvider extends BaseServiceProvider
{
    /*----------------------------------------*
     * Boot
     *----------------------------------------*/

    /**
     * boot
     *
     * @return void
     */
    public function boot(): void
    {
        $this->bootCommands();
    }

    /**
     * boot commands
     *
     * @return void
     */
    protected function bootCommands(): void
    {
        if (!$this->app->runningInConsole()) return;

        $this->commands([
            ResourceCommand::class,
        ]);
    }
}
