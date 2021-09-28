<?php

namespace Pasanks\Comet\Tests;

use Illuminate\Http\Request;

class FilterTest extends TestCase
{
    public function setUp(): void
    {
       $this->mockFilter = new MockFilter(Request::create('/?parameter_one=1', 'GET'));
    }

    public function testRetriveFilterParametersFromRequest()
    {
        $this->assertEquals(['parameter_one' => 1], $this->mockFilter->getFilters());
    }

    public function testFilterFunctionExsistance()
    {
        $this->assertEquals('parameterOne', $this->mockFilter->getFilterFunctionName('parameter_one'));
    }
}
