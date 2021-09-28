<?php

namespace Pasanks\Comet\Tests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Mockery as m;
use Pasanks\Comet\Tests\Fixtures\MockFilter;

class FilterTest extends TestCase
{
    public function tearDown(): void
    {
        m::close();
    }

    public function testRetrieveFilterParametersFromRequest()
    {
        $this->mockFilter = new MockFilter(
            Request::create('/?foo=bar', 'GET')
        );

        $this->assertEquals(['foo' => 'bar'], $this->mockFilter->getFilters());
    }

    public function testApplyRequestQueryAsFilterMethods()
    {
        $query = m::mock(Builder::class);
        $query->shouldReceive('where')
            ->once()
            ->with('foo', 'bar')
            ->andReturn($query);

        $this->mockFilter = new MockFilter(
            Request::create('/?foo=bar', 'GET')
        );

        $this->assertInstanceOf(
            Builder::class,
            $this->mockFilter->apply($query)
        );
    }

    public function testApplyRequestQueryAsMultipleFilterMethods()
    {
        $query = m::mock(Builder::class);
        $query->shouldReceive('where')
            ->once()
            ->with('foo', 'bar')
            ->andReturn($query);
        $query->shouldReceive('where')
            ->once()
            ->with('fuz', 'buz')
            ->andReturn($query);

        $this->mockFilter = new MockFilter(
            Request::create('/?foo=bar&fuz=buz', 'GET')
        );

        $this->assertInstanceOf(
            Builder::class,
            $this->mockFilter->apply($query)
        );
    }

    public function testQueryIsNotAppliedIfFilterMethodDoesNotExist()
    {
        $query = m::mock(Builder::class);
        $query->shouldReceive('where')
            ->times(0)
            ->andReturn();

        $this->mockFilter = new MockFilter(
            Request::create('/?bam=1', 'GET')
        );

        $this->assertInstanceOf(
            Builder::class,
            $this->mockFilter->apply($query)
        );
    }
}
