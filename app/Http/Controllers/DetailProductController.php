<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
  
    
    public function store(Product $product)
    {
        return view('home.single-product' , compact('product'));
    }
}
