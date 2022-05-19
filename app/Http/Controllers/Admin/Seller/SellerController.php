<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-seller')->only('index');
        $this->middleware('can:edit-seller')->only(['update','edit']);
        $this->middleware('can:delete-seller')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();
        if ($keyword = $request->search) {
            $users = User::where('name','LIKE',"%{$keyword}%")->orWhere('phone','LIKE',"{$keyword}");
        }

        $users = $users->whereVendor(1)->latest()->paginate(20);

        return view('admin.seller.all',compact('users'));

    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.seller.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validData = $request->validate([
            'name'                => 'required|min:3',
            'phone'               => ['required','regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/',Rule::unique('users')->ignore($id)],
            'shop_name'           => 'required|min:3',
            'state_id'            => 'required',
            'city_id'             => 'required',
            'shop_address'             => 'required',
            'shop_phone'          => 'required',
            'bank_name'           => 'required',
            'bank_account_number' => 'required',
            'approved'            => 'required',
            'bank_cart_number'    => 'required|size:16',
            'bank_shaba_number'   => 'required|size:26',
        ]);
        $user->update($validData);
        alert()->success('فروشنده با موفقیت ویرایش شد');
        return redirect(route('seller.index'));
    }

    public function destroy($id)
    {
        User::whereId($id)->delete();
        alert()->success('فرشنده با موفقیت حذف شد');
        return back();
    }
}
