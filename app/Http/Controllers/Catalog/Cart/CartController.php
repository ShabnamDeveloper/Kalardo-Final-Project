<?php

namespace App\Http\Controllers\Catalog\Cart;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart=Cart::all();
        return view('catalog.Cart.cart');
    }

    public function del_product(Product $product)
    {
        Cart::delete($product);
        return back();
    }

}
