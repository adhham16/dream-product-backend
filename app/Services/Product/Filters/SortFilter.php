<?php

namespace App\Services\Product\Filters;

class SortFilter
{
    public function apply($query, $value)
    {
        return $query->orderBy(
            $value['sort_by'] ?? 'created_at',
            $value['sort_dir'] ?? 'desc'
        );
    }
}
