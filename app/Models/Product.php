<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property bool $exported
 * @property string $title
 * @property string $desc
 * @property string $short_desc
 * @property string $images
 * @property string $category
 * @property string $brand Производитель
 * @property string $sku Артикуль
 * @property int $price
 * @property string $attr
 * @property string $options
 * @property string $hash
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereExported($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereImages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereModel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereShortDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $table = 'products';

    public $timestamps = true;

    protected $fillable = [
        'exported',
        'title',
        'desc',
        'short_desc',
        'images',
        'category',
        'brand',
        'sku',
        'price',
        'attr',
        'options',
        'hash'
    ];

    public static function rules()
    {
        return [
            'title' => 'required',
//            'brand' => 'required',
            'sku' => 'required',
            'hash' => 'required',
        ];
    }

    protected $guarded = [];

    public static function saveOrUpdate($attr = [])
    {
        if ( isset($attr['hash_old']) )
        {
            if ( $model = static::where(['hash' => $attr['hash_old']])->get()->first() )
            {
                $model->update([
                    'exported' => 0,
                    'title' => $attr['title'],
                    'desc' => @$attr['desc'],
                    'short_desc' => @$attr['short_desc'],
                    'images' => isset($attr['images']) ? serialize($attr['images']) : '',
                    'category' => isset($attr['category']) ? serialize($attr['category']) : '',
                    'attr' => isset($attr['attr']) ? serialize($attr['attr']) : '',
                    'options' => isset($attr['options']) ? serialize($attr['options']) : '',
                    'sku' => $attr['sku'],
                    'brand' => @$attr['brand'],
                    'price' => @$attr['price'],
                    'hash' => $attr['hash'],
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                return $model->id;
            }
        }
        if ( $model = static::where(['hash' => $attr['hash']])->get()->first() )
        {
            $model->update([
                'exported' => 0,
                'title' => $attr['title'],
                'desc' => @$attr['desc'],
                'short_desc' => @$attr['short_desc'],
                'images' => isset($attr['images']) ? serialize($attr['images']) : '',
                'category' => isset($attr['category']) ? serialize($attr['category']) : '',
                'attr' => isset($attr['attr']) ? serialize($attr['attr']) : '',
                'options' => isset($attr['options']) ? serialize($attr['options']) : '',
                'sku' => $attr['sku'],
                'brand' => @$attr['brand'],
                'price' => @$attr['price'],
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return $model->id;
        }
        else
        {
            $insert = static::insert([
                'title' => $attr['title'],
                'desc' => @$attr['desc'],
                'short_desc' => @$attr['short_desc'],
                'images' => isset($attr['images']) ? serialize($attr['images']) : '',
                'category' => isset($attr['category']) ? serialize($attr['category']) : '',
                'attr' => isset($attr['attr']) ? serialize($attr['attr']) : '',
                'options' => isset($attr['options']) ? serialize($attr['options']) : '',
                'sku' => $attr['sku'],
                'brand' => @$attr['brand'],
                'price' => @$attr['price'],
                'hash' => $attr['hash'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            if ($insert)
            {
                return static::where(['hash' => $attr['hash']])->get()->first()->id;
            }

        }
    }

    public static function getNotExportedProduct()
    {
        return static::where(['exported' => 0])->get()->first();
    }

    public static function isAllExported()
    {
        if (static::where(['exported' => 0])->get()->first())
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}