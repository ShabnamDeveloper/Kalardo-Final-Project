<?php

namespace App\Http\Livewire\Catalog\Shop;

use App\Models\Product;
use Livewire\Component;

class ChangeQuantityProduct extends Component
{
    public $product,$quantity;

    public function mount(Product $product,$quantity)
    {
        $this->product=$product;
        $this->quantity=$quantity;
    }
    public function render()
    {
        return view('livewire.catalog.shop.change-quantity-product',['product'=>$this->product,'quantity'=>$this->quantity]);
    }
    public
    function increase_qty(Product $product)
    {
        if (\App\Facades\Cart::has($product)) {
            \App\Facades\Cart::update_add($product, 1);
        }
        $cart=\App\Facades\Cart::get($product);
        $this->emit('ChangePrice');
        return $this->mount($cart['product'],$cart['quantity']);
    }

    public
    function reduce_qty(Product $product)
    {
        \App\Facades\Cart::update_reduce($product, 1);
        $cart = \App\Facades\Cart::get($product);
        $this->emit('ChangePrice');
        return $this->mount($cart['product'], $cart['quantity']);
    }
        public
        function change_qty(Product $product, $number)
        {
            \App\Facades\Cart::set_number($product, $number);
            $cart=\App\Facades\Cart::get($product);
            $this->emit('ChangePrice');
            return $this->mount($cart['product'],$cart['quantity']);
        }

    }
