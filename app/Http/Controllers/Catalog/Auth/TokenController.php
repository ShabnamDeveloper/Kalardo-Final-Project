<?php

namespace App\Http\Controllers\Catalog\Auth;

use App\Models\ActiveCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TokenController extends Controller
{
    public function getToken(Request $request){
        if(!$request->session()->has('token'))
            return redirect(route('auth'));

        $request->session()->reflash();

        return view('catalog.auth.token');
    }
    public function postToken(Request $request){

        $data = $request->validate([
            'token'=> ['required','numeric']

        ]);
        $code = $this->veryfyCode($data['token']);

        $user = User::whereMobile($code['mobile'])->first();


        if(!$user){
            alert()->error('کد وارد شده صحیح نمی باشد');
            return back();
        }
        $user->update($data);
        auth()->loginUsingId($user->id);

        ActiveCode::whereMobile($code['mobile'])->delete();
        $session = $request->session()->get('token');
        if(isset($session['redirect'])) return redirect($session['redirect']);

        return redirect('/');

    }

    private function veryfyCode($code){
        $code = ActiveCode::whereCode($code)->where('expired_at','>',now())->first();
        return $code;
    }
}
