<?php

namespace App\Http\Controllers;
//namespace App\Models\ActiveCode;
use App\ActiveCode;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function manageTowFactor()
    {
        return view('profile.two-factor-auth');
    }

    public function PostManageTowFactor (Request  $request)
    {
        $data = $request->validate([
            'type' => 'required|in:sms,off',
            'phone' => 'required_unless:type,off'
        ]);

        if($data['type'] === 'sms') {
            if($request->user()->phone_number !== $data ['phone']) {
                $code = ActiveCode::generateCode($request->user());
                $request->session()->flush('phone', $data['phone']);

//                return $code;

                return redirect(route('profile.2fa.phone'));
            } else {
                $request->user()->update([
                    'two_factor_type' => 'sms'
                ]);
            }
        }

        if($data['type'] === 'off') {
            $request->user()->update([
                'two_factor_type' => 'off'
            ]);
        }

        return back();

    }

    public function getPhoneVerify(Request $request)
    {
        if(! $request->session()->has('phone')) {
            return  redirect(route('profile.2fa.manage'));
        }
        return view('profile.phone-verify');
    }

    public function postPhoneVerify(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        $status = ActiveCode::verifyCode($request->token , $request->user());

        if($status) {
            $request->user()->activeCode()->delete();
//            $request->user()->update([
//                'phone_number' =>
//                'two_factor_type' => 'sms'
//            ]);

        }

        return redirect(route('profile.2fa.manage'));

        return  $request->token;
    }
}
