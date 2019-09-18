<?php

namespace CodeSmithTech\Genesis\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;

class DatabaseBlueprint extends Blueprint
{
    /**
     * @return $this
     */
    public function addIdAsFirstColumn(): DatabaseBlueprint
    {
        $column = $this->increments('id');
        $idx = array_search($column, $this->columns, true);
        array_unshift($this->columns, array_splice($this->columns, $idx, 1)[0]);
        return $this;
    }
}