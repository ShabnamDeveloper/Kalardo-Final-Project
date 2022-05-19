<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::query();
        if($keyword = $request->search){
            $brands = Brand::where('persian_name','LIKE',"%{$keyword}%");
        }

        $brands = $brands->latest()->paginate(20);
        return view('admin.brand.all',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataValidate = $request->validate([
            'persian_name'     => 'required|min:3',
            'english_name'     => 'required|min:3',
            'slug'             => 'required|min:3',
            'description'      => 'nullable',
            'meta_title'       => 'required',
            'meta_description' => 'required',
            'status'           => 'required',
        ]);
        Brand::create($dataValidate);
        return redirect(route('brand.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $dataValidate = $request->validate([
            'persian_name'     => 'required|min:3',
            'english_name'     => 'required|min:3',
            'slug'             => 'required|min:3',
            'description'      => 'nullable',
            'meta_title'       => 'required',
            'meta_description' => 'required',
            'status'           => 'required',
        ]);
        $brand->update($dataValidate);
        return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
                
        $brand->delete();
        return redirect(route('brand.index'));
    }
}
