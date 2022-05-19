<?php

namespace App\Http\Controllers\Admin\Show;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

        return view('admin.menu.index');

    }
    public function update(Request $request){


        $menu = Menu::find(1)->first();

        $data = $request->validate([
            'items'=> 'required'
        ]);
       return dd($data);
        $menu->update($data);
        dd(response());
    }
}
