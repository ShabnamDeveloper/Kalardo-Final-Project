<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductAlert;
use Illuminate\Http\Request;

class ProductAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $alerts = ProductAlert::query();

        if($keyword = $request->search){

            $alerts =ProductAlert::where('title','LIKE',"%{$keyword}%");
        }
        $alerts = $alerts->latest()->paginate(20);
        return view('admin.product-alert.all',compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-alert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'title'     => 'required|',
            'description'      => 'required',
            'product_id' => 'required',
            'status'           => 'required',
        ]);

        ProductAlert::create($validData);

        alert()->success('تگ مورد نظر با موفقیت ایجاد شد ');
        return redirect(route('product-alert.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductAlert  $ProductAlert
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAlert $ProductAlert)
    {
        return view('admin.product-alert.edit',compact('ProductAlert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductAlert  $ProductAlert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProductAlert $ProductAlert)
    {
        $validData = $request->validate([
            'title'     => 'required|',
            'description'      => 'required',
            'product_id' => 'required',
            'status'           => 'required',
        ]);

        $ProductAlert->update($validData);
        alert()->success('شهر مورد نظر با موفقیت ویرایش شد ');
        return redirect(route('product-alert.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAlert  $ProductAlert
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAlert $ProductAlert)
    {
        $ProductAlert->delete();
        alert()->success('شهر مورد نظر با موفقیت حذف شد ');
        return back();
    }
}
