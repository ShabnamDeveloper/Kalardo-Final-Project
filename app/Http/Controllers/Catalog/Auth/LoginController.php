<?php

namespace App\Http\Controllers\Catalog\Auth;

use App\Models\ActiveCode;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\KavenegarSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLogin()
    {
        session(['redirect' => url()->previous()]);

        return view('catalog.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'mobile' => ['required', 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/']
        ]);

        $user = User::firstOrCreate(['phone' => $data['mobile']]);

        $code = ActiveCode::generateCode($data['mobile']);

        $code = $user->notify(new KavenegarSMS($data['mobile'],'letka',$code));

        $request->session()->flash('token', [
            'code' => $code,
            'user_name' => $user->name,
            'redirect' => session()->get('redirect')]);

        return redirect(route('authtoken'));


    }


}
