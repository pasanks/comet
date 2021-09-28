<?php

namespace Pasanks\Comet\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Pasanks\Comet\Filterable;

class MockModel extends Model
{
    use Filterable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mock';
}
