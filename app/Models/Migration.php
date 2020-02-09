<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Migration
 *
 * @property int $id
 * @property string $migration
 * @property int $batch
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Migration whereBatch($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Migration whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Migration whereMigration($value)
 * @mixin \Eloquent
 */
class Migration extends Model
{
    protected $table = 'migrations';

    public $timestamps = false;

    protected $fillable = [
        'migration',
        'batch'
    ];

    protected $guarded = [];

        
}