<?php
namespace Jrumbut\EloquentMemoize\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Jrumbut\EloquentMemoize\MemoizingModel;

/**
 * Class MyModel
 *
 * A test model used for memoizing tests
 *
 * @package Jrumbut\EloquentMemoize\Tests\Models
 *
 * @property integer id
 * @property string name
 * @property string slow
 */
class MyModel extends MemoizingModel
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var Array
     */
    protected $fillable = ['name'];

    /**
     * The attributes that may be memoized
     *
     * @var Array
     */
     protected $memoized = ['*'];
}
