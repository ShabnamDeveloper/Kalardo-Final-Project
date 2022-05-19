<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $banner_info = array(
            'slider'              => Banner::whereLocation('home-banner')->whereStatus(1)->first(),
            'topBanner1'          => Banner::whereLocation('home-top-banner-1')->whereStatus(1)->first(),
            'topBanner2'          => Banner::whereLocation('home-top-banner-2')->whereStatus(1)->first(),
            'bottomBanner1'          => Banner::whereLocation('home-bottom-banner-1')->whereStatus(1)->first(),
    //            'topProductSlider'    => Featured::whereStatus(1)->whereLocation('1')->first(),
    //            'centerProductSlider' => Featured::whereStatus(1)->whereLocation('2')->first(),
    //            'bottomProductSlider' => Featured::whereStatus(1)->whereLocation('3')->first(),
        );
    
        return view('catalog.index',compact('banner_info'));
    }
}
