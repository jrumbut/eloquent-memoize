<?php
/**
 * This file is part of the Jrumbut.EloquentMemoize
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Jrumbut\EloquentMemoize;

use Illuminate\Database\Eloquent\Model;
use Jrumbut\EloquentMemoize\Traits\Memoizes;

class MemoizingModel extends Model
{
    use Memoizes;
}
