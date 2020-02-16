<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property int $id
 * @property string $source
 * @property string $title
 * @property string $hash
 * @property int $parent_id
 * @property bool $parseit
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereParseit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereSource($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = true;

    protected $fillable = [
        'source',
        'title',
        'hash',
        'parent_id',
        'parseit'
    ];


    public static function rules()
    {
        return [
            'hash' => 'required',
            'source' => 'required',
            'title' => 'required',
        ];
    }

    protected $guarded = [];

    public static function saveOrUpdate($category = [])
    {
        if ( isset($category['hash_old']) )
        {
            if ( $model = static::where(['hash' => $category['hash_old']])->get()->first() )
            {
                $model->update([
                    'title' => $category['title'],
                    'source' => $category['source'],
                    'parseit' => 0,
                    'available' => 1,
                    'parent_id' => $category['parent_id'],
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        if ( $model = static::where(['hash' => $category['hash']])->get()->first() )
        {
            $model->update([
                'title' => $category['title'],
                'source' => $category['source'],
                'parseit' => 0,
                'available' => 1,
                'parent_id' => $category['parent_id'],
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return 'update';
        }
        else
        {
            static::insert([
                'title' => $category['title'],
                'source' => $category['source'],
                'hash' => $category['hash'],
                'parent_id' => $category['parent_id'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return 'insert';
        }
    }

    public static function isAllParseit()
    {
        if (static::where(['parseit' => 0])->get()->first())
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}