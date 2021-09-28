<?php

namespace Pasanks\Comet\Tests;

use Pasanks\Comet\Filter;

class MockFilter extends Filter
{
    /**
     * Attributes to filters from.
     *
     * @var array
     */
    protected $filters = ['parameter_one'];

    /**
     * Filter by parameterOne.
     *
     * @return string
     */
    public function parameterOne()
    {
        return 'test';
    }
}
