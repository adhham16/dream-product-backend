<?php

namespace App\Services\Product\Filters;

class MinPriceFilter
{
    public function apply($query, $value)
    {
        return $query->where('price', '>=', $value);
    }
}
