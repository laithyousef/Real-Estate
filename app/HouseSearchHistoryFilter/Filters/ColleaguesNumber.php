<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/23/2020
 * Time: 11:07 AM
 */

namespace App\HouseSearchHistoryFilter\Filters;
use Illuminate\Database\Eloquent\Builder;

class ColleaguesNumber implements Filter
{
        public static function apply(Builder $builder, $value)
        {
            return $builder->where('colleagues_number',$value);
        }
}