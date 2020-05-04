<?php
namespace CodeSmithTech\Genesis;

use CodeSmithTech\Genesis\Database\Migrations\MigrateMakeCommand;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\ServiceProvider;

class GenesisServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton(MigrationCreator::class, function ($app) {
            return new MigrationCreator($app['files'], __DIR__ . '/Database/Migrations/stubs');
        });
        
        // register our custom CLI commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                MigrateMakeCommand::class,
            ]);
        }
    }
    
    public function register()
    {
    }
}