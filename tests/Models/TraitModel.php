<?php
namespace Jrumbut\EloquentMemoize\Models;

use Illuminate\Database\Eloquent\Model;
use Jrumbut\EloquentMemoize\Traits\Memoizes;

/**
 * Class TraitsModel
 *
 * A test model used for memoizing tests using a trait
 *
 * @package Jrumbut\EloquentMemoize\Tests\Models
 *
 * @property integer id
 * @property string name
 * @property string slow
 */
class TraitModel extends Model
{
    use Memoizes;

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
     * Initialize attributes
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::setMemoized(['slow']);
    }
}
