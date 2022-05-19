<?php


namespace App\Helpers\Cart;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Cart
 * @package App\Helpers\Cart
 * @method static bool has($id)
 * @method static Collection all();
 * @method static array get($id);
 * @method static Cart put(array $value , Model $obj = null)
 * @method static Cart instance(string $name)
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }
}
