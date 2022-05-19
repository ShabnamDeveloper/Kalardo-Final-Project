<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    
    public function cart()
    {
        return view('home.cart');
    }

    public function cart2()
    {
        return view('home.cart2');
    }


    public function addToCart(Product $product)
    {
        $cart = Cart::instance('roocket');

        if( $cart->has($product) ) {
            if($cart->count($product) < $product->inventory)
                $cart->update($product , 1);
        }else {
            $cart->put(
                [
                    'quantity' => 1,
                ],
                $product
            );
        }

        return view('home.cart');

    }

    public function quantityChange(Request $request)
    {
       $data = $request->validate([
           'quantity' => 'required',
           'id' => 'required',
           'cart' => 'required'
        ]);

        $cart = Cart::instance($data['cart']);

        if( $cart->has($data['id']) ) {
            $cart->update($data['id'] , [
               'quantity' => $data['quantity']
            ]);

            return response(['status' => 'success']);
        }

        return response(['status' => 'error'] , 404);

    }

    
    public function deleteFromCart($id)
    {
        Cart::delete($id);

        return view('home.cart');
    }
}
