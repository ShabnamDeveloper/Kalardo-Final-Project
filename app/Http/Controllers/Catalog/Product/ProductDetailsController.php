<?php

namespace App\Http\Controllers\Catalog\Product;

use App\Http\Controllers\Controller;
use App\Models\AttributeProduct;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($slug = null)
    {
        $product = Product::whereSlug($slug)->first();
        if (!$product) return abort(404);
        $product_option = ProductOption::where('product_id', $product->id)->get();
        $product_value=AttributeProduct::all();
//ProductOption::getOptionValue($product);
//        $optionValues=[];
//        foreach ($product_option as $pro_otn) {
////          $option
//            $option = Option::whereId($pro_otn['option_id'])->first();
//            $value = OptionValue::whereId($pro_otn['value_id'])->first();
//            $optionValues=
//        }
        $brand = $product->brand()->first();
        $brand_category = $brand->brandCategories()->first()->category()->first()->allParent();
        $categories = $product->categories()->first()->allParent();
        return view('catalog.product.product', ['product' => $product, 'categories' => $categories, 'brand' => $brand, 'brand_cat' => $brand_category,'product_option'=>$product_option]);
    }
}
