<?php

namespace App\Http\Controllers\Admin\Show;

use App\Models\Featured;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-featured')->only('index');
        $this->middleware('can:delete-featured')->only('destroy');
        $this->middleware('can:edit-featured')->only(['edit','update']);
        $this->middleware('can:create-featured')->only(['create','store']);
    }

    public function index(Request $request)
    {
        $featured = Featured::query();

        if ($keyword = $request->keyword) {
            $featured->whereName('LIKE',"%$keyword%");
        }
        $featureds  =$featured->latest()->paginate(20);

        return view('admin.featured.all',compact('featureds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.featured.create');
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
            'name'     => 'required',
            'products' => 'required|array',
            'status'   => 'required',
            'location' => 'required'
        ]);

        $featured = Featured::create($data);
        $featured->products()->sync($data['products']);
        alert()->success('لیست برجسته جدید باموفقیت افزوده شد');
        return redirect(route('featured.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function show(Featured $featured)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function edit(Featured $featured)
    {
        return view('admin.featured.edit',compact('featured'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Featured $featured)
    {
        $data = $request->validate([
            'name'     => 'required',
            'products' => 'required|array',
            'status'   => 'required',
            'location' => 'required'
        ]);

        $featured->update($data);
        $featured->products()->sync($data['products']);

        alert()->success('لیست برجسته مورد نظر باموفقیت ویرایش شد');
        return redirect(route('featured.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Featured  $featured
     * @return \Illuminate\Http\Response
     */
    public function destroy(Featured $featured)
    {
        return $featured->delete();
        alert()->success('لیست برجسته مورد نظر باموفقیت حذف شد');
        return back();
    }
}
