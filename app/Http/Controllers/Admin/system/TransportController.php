<?php

namespace App\Http\Controllers\Admin\system;

use App\Models\City;
use App\Http\Controllers\Controller;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-transport')->only('index');
        $this->middleware('can:create-transport')->only(['create','store']);
        $this->middleware('can:edit-transport')->only(['update','edit']);
        $this->middleware('can:delete-transport')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transports = Transport::query();

        if ($keyword = $request->search) {
            $transports = $transports->where('name','LIKE',"%{$keyword}%")->orWhere('label','LIKE',"%{$keyword}%");
        }

        $transports = $transports->latest()->paginate(20);
        return view('admin.transport.all',compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transport.create');
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
            'name'   => 'required|min:3',
            'status' => 'required',
            'cities' => 'array'
        ]);
       return dd($data['cities']);
        $transport = Transport::create($data);
        if($data['cities']){
            $this->attachCityToTransport($data['cities'],$transport);
        }

        alert()->success('شرکت مورد نظر با موفقیت ایجاد شد');
        return redirect(route('transport.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.

     * @param  \App\Models\transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(transport $transport)
    {
        return view('admin.transport.edit',compact('transport'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transport $transport)
    {
        $data = $request->validate([
            'name'   => 'required|min:3',
            'status' => 'required',
            'cities' => 'array'
        ]);


        $transport->update($data);
        $transport->cities()->detach();

        if(isset($data['cities'])){
            $this->attachCityToTransport($data['cities'],$transport);
        }
        alert()->success('شرکت مورد نظر با موفقیت ویرایش شد');
        return redirect(route('transport.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(transport $transport)
    {
        //
    }
    private function attachCityToTransport($data,$transport){
        $cities = collect($data);

        $cities->each(function($item) use($transport){
            if(is_null($item['city_id']) || is_null($item['price'])) return;

            $city = City::find($item['city_id']);

            $cityPrice = $city->prices()->firstOrCreate(
                ['price' => $item['price']]
            );
            $transport->cities()->attach($city->id,['price_id'=> $cityPrice['id']]);


        });

    }
}
