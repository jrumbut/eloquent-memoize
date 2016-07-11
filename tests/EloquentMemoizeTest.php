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

    public function testCorrectFieldsAreMemoized()
    {
        $actual = $this->skeleton;
        MyModel::setMemoized(['id']);
        $this->assertFalse($actual->shouldBeMemoized('name'));
        $this->assertTrue($actual->shouldBeMemoized('id'));
    }

    public function testSetAndGetFields()
    {
        $actual = $this->skeleton;
        MyModel::setMemoized(['id']);
        $this->assertEquals($actual->getMemoized(), ['id']);
    }
}
