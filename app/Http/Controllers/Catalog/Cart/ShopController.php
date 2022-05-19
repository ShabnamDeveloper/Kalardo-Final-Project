<?php

namespace App\Http\Controllers\Catalog\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('catalog.Cart.shop',compact('products'));
    }

}
