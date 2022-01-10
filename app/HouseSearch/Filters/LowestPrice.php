<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/23/2020
 * Time: 11:05 AM
 */

namespace App\HouseSearch\Filters;
use Illuminate\Database\Eloquent\Builder;

class LowestPrice implements Filter
{
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('price','>=',$value);
    }

}