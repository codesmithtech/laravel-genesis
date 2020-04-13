<?php
namespace CodeSmithTech\Genesis;

use CodeSmithTech\Genesis\Database\Migrations\MigrateMakeCommand;
use Illuminate\Support\ServiceProvider;

class GenesisServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // register our custom CLI commands
        $this->commands([
            MigrateMakeCommand::class,
        ]);
    }
    
    public function register()
    {
    }
}