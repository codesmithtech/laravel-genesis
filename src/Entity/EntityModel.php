<?php

namespace CodeSmithTech\Genesis\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property string $createdAt
 * @property string $updatedAt
 * @method static $this create(array $attributes)
 */
abstract class EntityModel extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';
    
    /**
     * @var array
     */
    protected $guarded = [];
    
    /**
     * @var array
     */
    protected $hidden = ['deletedAt', 'pivot', 'createdAt', 'updatedAt'];
    
    /**
     * @return Expression
     */
    public static function now(): Expression
    {
        return DB::raw('NOW()');
    }
}