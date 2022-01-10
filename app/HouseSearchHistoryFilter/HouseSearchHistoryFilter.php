<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/23/2020
 * Time: 10:58 AM
 */

namespace App\HouseSearchHistoryFilter;


use App\Models\HouseSearchesWithColleague;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HouseSearchHistoryFilter
{
    public static function apply(Request $filters)
    {
        $query =
            static::applyDecoratorsFromRequest(
                $filters, (new HouseSearchesWithColleague())->newQuery()
            );

//        ddd($query);

        return static::getResults($query);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {

            $decorator = static::createFilterDecorator($filterName);

            if (static::isValidDecorator($decorator) && $value!=null) {
                $query = $decorator::apply($query, $value);
            }

        }
        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return  __NAMESPACE__ . '\\Filters\\' .
        str_replace(' ', '',
            ucwords(str_replace('_', ' ', $name)));
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getResults(Builder $query)
    {
        return $query;
    }

}