<?php

namespace App\Http\Controllers\Catalog\Cart;

use App\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index()
    {
//        $cartItems = Cart::all();
//        if ($cartItems->count()) {
//            $price = $cartItems->sum(function ($cart) {
//                return $cart['product']->price * $cart['quantity'];
//            });
//        }
//        $order = auth()->user()->orders()->create([
//            'status' => 'unpaid',
//            'price' => $price,
//        ]);
//        $orderItems = $cartItems->mapWithKeys(function ($cart) {
//            return [$cart['product']->id => ['quantity' => $cart['quantity']]];
//        });
//        $order->products()->attach($orderItems);
////        }
        \App\Facades\Cart::CartSave();
        $order=auth()->user()->orders()->whereStatus('unpaid')->first();
//        $product=->attach('quantity');
        $quantities=0;
        if($order){
            foreach ($order->products as $pro){
                $quantities+=$pro->pivot->quantity;
            }
        }
        $addresses=auth()->user()->addresses;
//        foreach ($address as $add){
//        }
//        ;
        return view('livewire.catalog.ship',['order'=>$order,'quantities'=>$quantities,'addresses'=>$addresses]);

//        $cart_user = auth()->user()->orders()->whereStatus('unpaid')->first() ?? null;
//        if ($cart_user) {
//            $order = auth()->user()->orders()->update([
//                'price' => $price + $cart_user->price,
//            ]);
////            $orderItems = $cartItems->mapWithKeys(function ($cart) {
////                return [$cart['product']->id => ['quantity' => $cart['quantity']]];
////            });
////            $user_cart_items=$cart_user->products();
////            $orderItems1 = $user_cart_items->mapWithKeys(function ($cart) {
////                return [$cart['product']->id => ['quantity' => $cart['quantity']]];
////            });
//        } else {
    }

}
