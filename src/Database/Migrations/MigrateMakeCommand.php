<?php

namespace CodeSmithTech\Genesis\Database\Migrations;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as LaravelMigrateCommand;
use Illuminate\Support\Composer;

class MigrateMakeCommand extends LaravelMigrateCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'gen:make:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';
    
    /**
     * Create a new migration install command instance.
     *
     * @param  MigrationCreator  $creator
     * @param Composer $composer
     * @return void
     */
    public function __construct(MigrationCreator $creator, Composer $composer)
    {
        parent::__construct($creator, $composer);
    }
}
