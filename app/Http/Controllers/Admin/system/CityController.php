<?php

namespace App\Http\Controllers\Admin\system;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-city')->only('index');
        $this->middleware('can:create-city')->only(['create','store']);
        $this->middleware('can:edit-city')->only(['update','edit']);
        $this->middleware('can:delete-city')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $cities = City::query();
        if($keyword = $request->state_id){
            $cities = City::latest()->where('state_id',$keyword);
        }
        if($keyword = $request->search){

            $cities = City::where('name','LIKE',"%{$keyword}%");
        }
        $cities = $cities->latest()->paginate(20);
        return view('admin.city.all',compact('cities'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.city.create');
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
            'name'     => 'required|unique:states',
            'state_id' => 'required',
        ]);

        City::create($validData);

        alert()->success('شهر مورد نظر با موفقیت ایجاد شد ');
        return redirect(route('city.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admin.city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $validData = $request->validate([
            'name'     => ['required',Rule::unique('cities')->ignore($city->id)],
            'state_id' => 'required',
        ]);

        $city->update($validData);

        alert()->success('شهر مورد نظر با موفقیت ویرایش شد ');
        return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
       $city->delete();
        alert()->success('شهر مورد نظر با موفقیت حذف شد ');
        return back();
    }
}
