<?php

namespace App\Services\Product\Filters;

class CategoryFilter
{
    public function apply($query, $value)
    {
        return $query->where('category', $value);
    }
}
