<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/23/2020
 * Time: 11:06 AM
 */

namespace App\HouseSearchHistoryFilter\Filters;
use Illuminate\Database\Eloquent\Builder;

class HighestPrice implements  Filter
{
  public static function apply(Builder $builder, $value)
  {
      return $builder->where('highest_price','<=',$value);
  }
}