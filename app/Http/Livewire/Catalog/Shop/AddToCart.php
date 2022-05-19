<?php

namespace App\Http\Livewire\Catalog\Shop;

use App\Models\Product;
use Livewire\Component;
use \App\Facades\Cart;

class AddToCart extends Component
{
    public $product;

    public function mount(Product $productId)
    {
        $this->product = $productId;

    }

    public function render()
    {
        return view('livewire.catalog.shop.add-to-cart');
    }

    public function addToCart($number)
    {
        $product = $this->product;
        if (Cart::has($product)) {
            if (Cart::count($product) < $product->inventory)
                Cart::update_add($product, 1);
        } else {
            Cart::put([
                'quantity' => $number,
                'price' => $product->id
            ], $product);
        }
    }
}
