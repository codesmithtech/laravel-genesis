<?php
namespace CodeSmithTech\Genesis\Database\Migrations;

use CodeSmithTech\Genesis\Entity\EntityModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseMigration extends Migration
{
    /**
     * @var Builder
     */
    protected $schema;
    
    protected $databaseConnection = 'mysql';
    
    protected $databaseConnectionForTesting;
    
    public function __construct()
    {
        $this->schema = Schema::connection($this->getDatabaseConnection());
        $this->schema->blueprintResolver(function($table, $callback) {
            return new DatabaseBlueprint($table, $callback);
        });
    }
    
    /**
     * @param DatabaseBlueprint $table
     */
    public function standardiseTable(DatabaseBlueprint $table)
    {
        $table->addIdAsFirstColumn();
        $table->timestamp(EntityModel::CREATED_AT)->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp(EntityModel::UPDATED_AT)->nullable();
    }
    
    /**
     * @param DatabaseBlueprint $table
     */
    public function softDeletes(DatabaseBlueprint $table)
    {
        $table->timestamp(EntityModel::DELETED_AT)->nullable();
    }
    
    private function getDatabaseConnection(): string
    {
        if (App::runningUnitTests()) {
            return $this->databaseConnectionForTesting ? : $this->databaseConnection;
        }
        
        return $this->databaseConnection;
    }
}