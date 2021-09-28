<?php

namespace Pasanks\Comet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Pasanks\Comet\Tests\Fixtures\MockFilter;
use Pasanks\Comet\Tests\Fixtures\MockModel;
use Pasanks\Comet\Tests\TestCase;

class ModelFilterTest extends TestCase
{
    use RefreshDatabase;

    public function testFilterModelValues()
    {
        $this->migrate();

        $model = MockModel::create(['foo' => 'bar']);

        $request = Request::create('/?foo=bar', 'GET');
        $filter = new MockFilter($request);

        $filteredModel = MockModel::filter($filter)->first();

        $this->assertTrue($model->is($filteredModel));
    }

    public function testFilterOnlyAvailableModelValues()
    {
        $this->migrate();

        $model = MockModel::create(['foo' => 'bar']);

        $request = Request::create('/?baz=bar', 'GET');
        $filter = new MockFilter($request);

        $filteredModel = new MockModel();
        $filteredModel->filter($filter)->first();

        $this->assertFalse($model->is($filteredModel));
    }
}
