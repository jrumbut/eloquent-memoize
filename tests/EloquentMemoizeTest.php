<?php

namespace Jrumbut\EloquentMemoize;

class EloquentMemoizeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EloquentMemoize
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new EloquentMemoize;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\Jrumbut\EloquentMemoize\EloquentMemoize', $actual);
    }
}
