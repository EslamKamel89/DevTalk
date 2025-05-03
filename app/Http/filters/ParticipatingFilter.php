<?php

namespace App\Http\Filters;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ParticipatingFilter implements Filter {
    public function __invoke(Builder $query, $value, string $property) {
        $query->whereHas('posts', function (Builder $query) {
            $query->where('user_id', auth()->id());
        });
    }
}
