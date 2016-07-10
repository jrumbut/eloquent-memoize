<?php
/**
 * This file is part of the Jrumbut.EloquentMemoize
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Jrumbut\EloquentMemoize;

use Illuminate\Database\Eloquent\Model;

class MemoizingModel extends Model
{
    /**
    * List of attributes to be memoized
    *
    * @var Array
    */
    protected static $memoized = [];

    /**
    * Structure where memoized attributes are stored
    *
    * @var Array
    */
    protected $memoized_values = [];

    /**
    * Is memoizing enabled?
    *
    * @var bool
    */
    protected static $memoizing_enabled = true;

    /**
    * See if attribute has been memoized, and if so return it, else do
    * parent procedure for getting attribute
    *
    * @param string $key
    * @return mixed $value
    */
    public function getAttribute($key)
    {
        $value = null;

        if ($this->shouldBeMemoized($key)) {
            if (array_key_exists($key, $this->memoized_values)) {
                $value = $this->memoized_values[$key];
            } else {
                $value = parent::getAttribute($key);
                $this->memoizeAttribute($key, $value);
            }
        } else {
            $value = parent::getAttribute($key);
        }

        return $value;
    }

    /**
    * Set (and clear memoized value for) a given attribute on the model.
    *
    * @param  string  $key
    * @param  mixed  $value
    * @return $this
    */
    public function setAttribute($key, $value)
    {
        // Remove the old value, no one wants it anymore
        if (array_key_exists($key, $this->memoized_values)) {
            unset($this->memoized_values[$key]);
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * Memoize attributes
     *
     * @param string $key
     * @param mixed $value
     */
     public function memoizeAttribute($key, $value)
     {
         $this->memoized_values[$key] = $value;
     }

    /**
    * Get the memoized attributes for the model.
    *
    * @return array
    */
    public function getMemoized()
    {
        return static::$memoized;
    }

    /**
    * Set the memoized attributes for the model.
    *
    * @param  array  $memoized
    * @return $this
    */
    public static function setMemoized(array $memoized)
    {
        static::$memoized = $memoized;
    }

    /**
    * Disable all memoization.
    *
    * @param  bool  $state
    * @return void
    */
    public static function disableMemoization($state = false)
    {
        static::$memoizing_enabled = $state;
    }

    /**
    * Enable memoization.
    *
    * @return void
    */
    public static function enableMemoization()
    {
        static::$memoizing_enabled = true;
    }

    /**
     * Check if attribute should be memoized
     *
     * @param string $key
     * @return bool should_be_memoized
     */
     public function shouldBeMemoized($key)
     {
         $memoized = $this->getMemoized();
         return (in_array($key, $memoized) || $memoized == ['*'])  && static::$memoizing_enabled;
     }
}
