<?php

namespace App\Http\Controllers\Admin\Show;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-banner')->only('index');
        $this->middleware('can:create-banner')->only(['create','store']);
        $this->middleware('can:edit-banner')->only(['edit','update']);
        $this->middleware('can:delete-banner')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index',compact('banners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');

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
            'name'      => 'required',
            'status'    =>'required',
            'location'  =>'required',
            'banners'   => 'required|array',
        ]);

        $banner = Banner::create($data);

        foreach($data['banners'] as $banners){
            $banner->bannerImages()->create([
                'images' => $banners['images'],
                'url' => $banners['url'],
            ]);
        }
        alert()->success('بنر با موفقیت ایجاد شد');
        return redirect(route('banner.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'name'      => 'required',
            'location'  =>'required',
            'status'    =>'required',
            'banners'   => 'required|array',
        ]);
        $banner->update($data);
        $banner->bannerImages()->delete();

        foreach($data['banners'] as $banners){
            $banner->bannerImages()->create([
                'images' => $banners['images'],
                'url'    => $banners['url'],
            ]);
        }
        alert()->success('بنر با موفقیت ویرایش شد');
        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        alert()->success('بنر مورد نظر با موفقیت حذف شد');
        return back();


    }
}
