<?php

namespace App\Http\Livewire\Catalog\Shop;

use Livewire\Component;

class Ship extends Component
{

    public function render()
    {
        \App\Facades\Cart::CartSave();
        $order=auth()->user()->orders()->whereStatus('unpaid')->first();
//        $product=->attach('quantity');
        $quantities=0;
        if($order){
            foreach ($order->products as $pro){
                $quantities+=$pro->pivot->quantity;
            }
        }

        return view('livewire.catalog.shop.ship',compact('quantities','order'))->layout('catalog.layouts.base');;
    }
}
