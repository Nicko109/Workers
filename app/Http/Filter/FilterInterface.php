<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
public function applyFilter(Builder $builder);
}
