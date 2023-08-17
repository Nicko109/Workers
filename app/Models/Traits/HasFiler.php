<?php

namespace App\Models\Traits;

use App\Http\Filter\AbstractFilter;
use App\Http\Filter\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasFiler
{
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->applyFilter($builder);
        return $builder;
    }
}
