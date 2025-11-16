<?php

namespace App\Services\Product\Filters;

class StockStatusFilter
{
    public function apply($query, $value)
    {
        return $query->where('stock_status', $value);
    }
}
