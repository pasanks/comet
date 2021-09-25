<?php

namespace Pasanks\Comet;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Apply all relevant query filters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Pasanks\Comet\Filter                 $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, Filter $filters): Builder
    {
        return $filters->apply($query);
    }
}
