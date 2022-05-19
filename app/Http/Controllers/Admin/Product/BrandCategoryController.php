<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandCategory;
use Illuminate\Http\Request;

class BrandCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandCategories = BrandCategory::all();
        return view('admin.brand-category.all',compact('brandCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.brand-category.create');
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
            'category_id'      => 'required',
            'brand_id'         => 'required',
            'description'      => 'nullable',
            'meta_title'       => 'nullable',
            'meta_description' => 'nullable',
            'status'           => 'required',
        ]);
        BrandCategory::create($data);

        return redirect(route('brand-category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrandCategory  $brandCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BrandCategory $brandCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrandCategory  $brandCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandCategory $brandCategory)
    {
        return view('admin.brand-category.edit',compact('brandCategory'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrandCategory  $brandCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandCategory $brandCategory)
    {
        $data = $request->validate([
            'category_id'      => 'required',
            'brand_id'         => 'required',
            'description'      => 'nullable',
            'meta_title'       => 'nullable',
            'meta_description' => 'nullable',
            'status'           => 'required',
        ]);
        $brandCategory->update($data);
        
        return redirect(route('brand-category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrandCategory  $brandCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandCategory $brandCategory)
    {
        $brandCategory->delete();
        return back();
    }
}
