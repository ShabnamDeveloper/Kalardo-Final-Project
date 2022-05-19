<?php

namespace App\Http\Controllers\Catalog\Common;

use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCitiesByStateId(Request $request){
        $data = $request->validate([
            'id' =>'required',
        ]);
        $cities = City::where('state_id',$data['id'])->get();
        if(is_null($cities)) return response(['data'=>[]]);
        return response($cities->pluck('name','id'));
    }
}
