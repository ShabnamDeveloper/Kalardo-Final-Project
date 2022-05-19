<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('can:show-customer')->only('index');
        $this->middleware('can:delete-customer')->only('destroy');
        $this->middleware('can:edit-customer')->only(['edit','approved']);
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
        $users = $users->where('group_id','=','5')->latest()->paginate(siteConfig('config_per_admin_page'));

        return view('admin.customer.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        return  view('admin.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validData = $request->validate([
            'name'                => 'required|min:3',
            'phone'               => ['required','regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/',Rule::unique('users')->ignore($id)],
            'shop_address'        => 'required',
            'state_id'            => 'required',
            'city_id'             => 'required',
            'approved'            => 'required',
        ]);
        $user->update($validData);


        alert()->success('مشتری با موفقیت ویرایش شد');
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
