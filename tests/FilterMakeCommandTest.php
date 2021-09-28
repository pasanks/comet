<?php

namespace Pasanks\Comet\Tests;

class FilterMakeCommandTest extends TestCase
{
    /**
     * Name of filter file.
     *
     * @var string
     */
    protected $testFilterFile;

    /**
     * Name of filter class.
     *
     * @var string
     */
    protected $name = 'MockFilter';

    public function setUp(): void
    {
        parent::setUp();

        $this->testFilterFile = app_path("Filters/{$this->name}.php");

        $this->deleteFile($this->testFilterFile);
    }

    public function tearDown(): void
    {
        parent::tearDown();

        $this->deleteFile($this->testFilterFile);
    }

    public function testCreateFilterClass()
    {
        $this->artisan('make:filter', ['name' => $this->name])->assertExitCode(0);

        $this->assertTrue(is_file($this->testFilterFile));
    }
}
