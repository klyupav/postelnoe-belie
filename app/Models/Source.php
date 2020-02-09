<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
/**
 * Class Source
 *
 * @property string $hash
 * @property string $url
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereHash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereUrl($value)
 * @mixin \Eloquent
 * @property int $id
 * @property bool $parseit
 * @property bool $available
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereParseit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereAvailable($value)
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereUpdatedAt($value)
 * @property string $param
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereParam($value)
 * @property int $product_id
 * @property string $source
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Source whereSource($value)
 */
class Source extends Model
{
    protected $table = 'sources';

    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'hash',
        'source',
        'parseit',
        'param',
        'available',
    ];

    public static function rules()
    {
        return [
            'hash' => 'required',
            'source' => 'required',
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
                    'hash' => $attr['hash'],
                    'parseit' => 0,
                    'available' => 1,
                    'param' => empty(@$attr['param']) ? null : serialize(@$attr['param']),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        if ( $model = static::where(['hash' => $attr['hash']])->get()->first() )
        {
            $model->update([
                'parseit' => 0,
                'available' => 1,
                'param' => empty(@$attr['param']) ? null : serialize(@$attr['param']),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return 'update';
        }
        else
        {
            static::insert([
                'param' => empty(@$attr['param']) ? null : serialize(@$attr['param']),
                'hash' => $attr['hash'],
                'source' => $attr['source'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return 'insert';
        }
    }
}