<?php

namespace App\Http\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class PopularFilter implements Filter {
    public function __invoke(Builder $query, $value, string $property) {
        $query->has('posts', '>', $value);
    }
}
