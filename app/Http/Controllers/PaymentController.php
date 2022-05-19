<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
//use App\Helpers\Cart\Cart;
use App\Models\Product;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment()
    {
        $cart = Cart::instance('roocket');
        $cartItems = $cart->all();
        if($cartItems->count()) {
            $price = $cartItems->sum(function($cart) {
                return $cart['product']->price * $cart['quantity'];
            });

            $orderItems = $cartItems->mapWithKeys(function($cart) {
                return [$cart['product']->id => [ 'quantity' => $cart['quantity']] ];
            });

            $order = auth()->user()->orders()->create([
                'status' => 'unpaid',
                'price' => $price
            ]);

            $order->products()->attach($orderItems);

            $token = config('services.payping.token');
            $res_number = Str::random();
            $args = [
                "amount" => 1000 ,
                "payerName" => auth()->user()->name,
                "returnUrl" => route('payment.callback'),
                "clientRefId" => $res_number
            ];

            $payment = new \PayPing\Payment($token);

            try {
                $payment->pay($args);
            } catch (\Exception $e) {
//                throw $e;
            }
            //echo $payment->getPayUrl();
            $order->payments()->create([
                'resnumber' => $res_number,
                'price' => 100
            ]);

            $cart->flush();

            return redirect($payment->getPayUrl());
        }

        // alert()->error();
        return back();
    }

    public function callback()
    {

    }
}