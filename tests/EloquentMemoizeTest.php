<?php

namespace Jrumbut\EloquentMemoize;

use Jrumbut\EloquentMemoize\Models\MyModel;
use Jrumbut\EloquentMemoize\Models\TraitModel;
use Illuminate\Database\Eloquent\Model;

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
        $this->trait_skeleton = new TraitModel(['id' => 2, 'name' => 'philip k dick']);
    }

    public function testNew()
    {
        $my_model = $this->skeleton;
        $trait_model = $this->trait_skeleton;
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Model', $my_model);
        $this->assertInstanceOf('\Jrumbut\EloquentMemoize\MemoizingModel', $my_model);
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Model', $trait_model);
    }

    public function testMemoizationEnabledByDefault()
    {
        $my_model = $this->skeleton;
        $this->assertTrue($my_model->shouldBeMemoized('name'));
    }

    public function testCorrectFieldsAreMemoized()
    {
        $my_model = $this->skeleton;
        MyModel::setMemoized(['id']);
        $this->assertFalse($my_model->shouldBeMemoized('name'));
        $this->assertTrue($my_model->shouldBeMemoized('id'));
    }

    public function testSetAndGetMemoized()
    {
        $my_model = $this->skeleton;
        MyModel::setMemoized(['id']);
        $this->assertEquals($my_model->getMemoized(), ['id']);
    }

    public function testDisableMemoization()
    {
        $trait_model = $this->trait_skeleton;
        TraitModel::disableMemoization();
        $this->assertEquals($trait_model->getMemoized(), []);
    }

    public function testEnableMemoization()
    {
        $my_model = $this->skeleton;
        MyModel::setMemoized(['name']);
        MyModel::disableMemoization();
        $this->assertEquals($my_model->getMemoized(), []);
        MyModel::enableMemoization();
        $this->assertTrue($my_model->shouldBeMemoized('name'));
    }

    public function testSettingMemoizedToStringShouldFail()
    {
        $this->expectException('TypeError');
        MyModel::setMemoized('id');
    }
}
