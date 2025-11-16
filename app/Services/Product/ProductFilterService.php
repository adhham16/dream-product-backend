<?php

namespace App\Services\Product;

use App\Services\Product\Filters\CategoryFilter;
use App\Services\Product\Filters\MaxPriceFilter;
use App\Services\Product\Filters\MinPriceFilter;
use App\Services\Product\Filters\SortFilter;
use App\Services\Product\Filters\StockStatusFilter;

class ProductFilterService
{
    protected $filters = [
        'category'      => CategoryFilter::class,
        'stock_status'  => StockStatusFilter::class,
        'min_price'     => MinPriceFilter::class,
        'max_price'     => MaxPriceFilter::class,
        'sort'          => SortFilter::class,
    ];

    public function applyFilters($query, array $params)
    {
        foreach ($params as $key => $value) {

            if (!isset($this->filters[$key]) || empty($value)) {
                continue;
            }

            $filterClass = $this->filters[$key];
            $filter = new $filterClass;

            $filter->apply($query, $value);
        }

        return $query;
    }
}
