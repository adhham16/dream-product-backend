<?php

namespace App\Services\Product\Filters;

class MaxPriceFilter
{
    public function apply($query, $value)
    {
        return $query->where('price', '<=', $value);
    }
}
