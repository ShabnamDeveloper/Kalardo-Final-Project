<?php

namespace App\Http\Controllers\Admin\system;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-user')->only('index');
        $this->middleware('can:create-user')->only(['create','store']);
        $this->middleware('can:edit-user')->only(['update','edit']);
        $this->middleware('can:delete-user')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $users = User::query();

        $users->when($keyword = $request->search,function($query) use($keyword){
            return $query->where('name','LIKE',"%{$keyword}%");
        });

        $users = $users->where('group_id','<>','6')->latest()->paginate(20);
        return view('admin.user.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => ['required','string','max:255'],
            'phone' =>['required','unique:users','regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/'],
            'permissions' => ['array'],
            'roles' =>['required','array'],
            'group_id' =>['required'],

        ]);
        $user = User::create($data);

        if ($data['permissions']) {
            $user->permissions()->sync($data['permissions']);
        }
        $user->roles()->sync($data['roles']);

//        alert()->success('کاربر جدید با موفقیت ایجاد شد');
        return redirect(route('user.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'phone' =>['required','regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/',Rule::unique('users')->ignore($user->id)],
            'permissions' => ['array'],
            'roles' =>['required','array'],
            'group_id' =>['required'],
        ]);

        $user->update($data);
        if (!isset($data['permissions'])) $data['permissions'] = array();
        $user->permissions()->sync($data['permissions']);

        $user->roles()->sync($data['roles']);
//        alert()->success('کاربر جدید با موفقیت ویرایش شد');
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
         $user->delete();
//        alert()->success('کاربر مورد نظر با موفقیت حذف شد');
        return redirect(route('user.index'));
    }


}
