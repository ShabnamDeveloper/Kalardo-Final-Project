<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Attribute;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('can:show-product')->only('index');
        $this->middleware('can:edit-product')->only(['edit','update']);
        $this->middleware('can:create-product')->only(['create','store']);
        $this->middleware('can:delete-product')->only('destroy');
    }
    public function index(Request $request)
    {
        
        $products = Product::query();

        if($keyword = $request->search){
            $products = Product::where('name','LIKE',"%{$keyword}%");
        }

        $products = $products->latest()->paginate(20);
        return view('admin.product.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name'             =>['required','min:3'],
            'slug'             =>['required','min:3','unique:products,slug'],
            'inventory'        =>['required','numeric',],
            'status_id'        =>['required'],
            'brand_id'         =>['required'],
            'image'            =>['required'],
            'price'            =>['required','numeric'],
            'categories'       => 'required|array',
            'related_products' => 'array',
            'attributes'       => 'array',
            'images'           => 'array',
            'short_description'=> ['nullable'],
            'description'      => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_title'       => ['nullable'],
        ]);


        $product = Auth::user()->products()->create($data);
        
        if(isset($data['related_products'])){
            $product->relatedProducts()->sync($data['related_products']);
        }
        $product->categories()->sync($data['categories']);

        if (isset($data['attributes'])) {

            $this->attachAttributeToProduct($data,$product);

        }
        if (isset($data['images'])) {
            foreach($data['images'] as $image){
                $product->productImages()->create([
                    'image' => $image,
                ]);
            }
        }
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {

        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {

        $data = $request->validate([
            'name'             =>['required','min:3'],
            'slug'             =>['required','min:3',Rule::unique('products')->ignore($product->id)],
            'inventory'        =>['required','numeric'],
            'status_id'        =>['required'],
            'brand_id'         =>['required'],
            'image'            =>['required'],
            'price'            =>['numeric','required'],
            'short_description'=> ['nullable'],
            'description'      => ['nullable'],
            'meta_description' => ['nullable'],
            'meta_title'       => ['nullable'],
            'categories'       => 'required|array',
            'related_products' => 'array',
            'attributes'       => 'array',
            'images'           => 'array',
        ]);


        $product->update($data);

        if(isset($data['related_products'])){
            $product->relatedProducts()->sync($data['related_products']);
        }

        // $product->categories()->sync($data['categories']);

        // $product->attributes()->detach();

        // if (isset($data['attributes'])) {
        //     $this->attachAttributeToProduct($data,$product);
        // }
        // $product->productImages()->delete();

        // if (isset($data['images'])) {

        //     foreach($data['images'] as $image){
        //         $product->productImages()->create([
        //             'image' => $image,
        //         ]);
        //     }
        // }

        alert()->success('محصول جدید با موفقیت ویرایش شد');
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        alert()->success('محصول جدید با موفقیت حذف شد');
        return redirect(route('product.index'));
    }

    private function attachAttributeToProduct($data,$product){
        $attributes = collect($data['attributes']);

        $attributes->each(function($item) use($product){

            if( is_null($item['name']) || is_null($item['value']) ) return;

            $attribute = Attribute::firstOrCreate([
                'name' => $item['name']
            ]);
            $attrValue = $attribute->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attribute->id,['value_id'=>$attrValue->id]);
        });
    }
}
