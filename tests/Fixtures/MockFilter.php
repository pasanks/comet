<?php

namespace Pasanks\Comet\Tests\Fixtures;

use Illuminate\Database\Eloquent\Builder;
use Pasanks\Comet\Filter;

class MockFilter extends Filter
{
    /**
     * Attributes to filters from.
     *
     * @var array
     */
    protected $filters = ['foo', 'fuz'];

    /**
     * Filter by foo column.
     *
     * @param string $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function foo(string $value): Builder
    {
        return $this->builder->where('foo', $value);
    }

    /**
     * Filter by fuz column.
     *
     * @param string $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function fuz(string $value): Builder
    {
        return $this->builder->where('fuz', $value);
    }
}
