<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/23/2020
 * Time: 11:08 AM
 */

namespace App\HouseSearch\Filters;
use Illuminate\Database\Eloquent\Builder;

class Direction implements Filter
{

    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('direction',$value);
    }
}