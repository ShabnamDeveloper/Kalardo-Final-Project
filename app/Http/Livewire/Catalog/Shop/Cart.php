<?php

namespace App\Http\Livewire\Catalog\Shop;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $cart,$key;

    protected $listeners = [
        'ChangePrice' => '$refresh',
    ];

    public function mount()
    {
//        $userId = Auth()->user()->id ?? null ;
        $this->cart = \App\Facades\Cart::all();
    }

    public function render()
    {
        return view('livewire.catalog.shop.cart', ['cart' => $this->cart])->layout('catalog.layouts.base');
    }

    public function del_product(Product $product)
    {
        \App\Facades\Cart::delete($product);
        return $this->mount();
    }

}
