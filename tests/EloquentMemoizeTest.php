<?php

namespace Jrumbut\EloquentMemoize;

use Jrumbut\EloquentMemoize\Models\MyModel;

class EloquentMemoizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EloquentMemoize
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new MyModel(['id' => 1, 'name' => 'thomas pynchon']);
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\Jrumbut\EloquentMemoize\MemoizingModel', $actual);
    }

    public function testMemoizationEnabledByDefault()
    {
        $actual = $this->skeleton;
        $this->assertTrue($actual->shouldBeMemoized('name'));
    }
}
