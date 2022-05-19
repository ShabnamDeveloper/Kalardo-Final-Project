<?php

namespace App\Http\Controllers\Admin\system;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-setting')->only('index');
        $this->middleware('can:edit-setting')->only('update');
    }

    public function index(){
        $info = Setting::whereCode('config')->get();
        
        return view('admin.setting.index',compact('info'));

    }

    public function update(Request $request){
        
        
        $data = $request->validate([

            'config_meta_title'       => 'required',
            'config_meta_description' => 'required',
            'config_select_theme'     => 'nullable',
            'config_store_name'       => 'required',
            'config_store_owner'      => 'required',
            'config_address'          => 'required',
            'config_phone'            => 'required',
            'config_mobile'           => 'required',
            'config_fax'              => 'nullable',
            'config_email'            => 'required',
            'config_open_time'        => 'required',
            'config_comment'          => 'required',
            'config_state'            => 'required',
            'config_city'             => 'nullable',
            'config_category_count'   => 'required',
            'config_per_admin_page'   => 'required',
            'config_image'            => 'required',
            'config_icon'             => 'required',
            'config_order_status'     => 'nullable',
            'config_account_terms'    => 'nullable',

        ]);
        
        Setting::whereCode('config')->delete();

        foreach ($data as $key => $value) {
            Setting::create([
                'code'  => 'config',
                'key'   => $key,
                'value' => $value
            ]);
        }

          return back();  
        $setting->update($data);
        alert()->success('تنظیمات بروز رسانی شد');
        return back();
    }
}
