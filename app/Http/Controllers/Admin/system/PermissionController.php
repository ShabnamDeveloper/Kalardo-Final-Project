<?php

namespace App\Http\Controllers\Admin\system;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('can:show-permission')->only('index');
        $this->middleware('can:create-permission')->only(['create','store']);
        $this->middleware('can:edit-permission')->only(['update','edit']);
        $this->middleware('can:delete-permission')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $permissions = Permission::query();

        if ($keyword = $request->search) {

            $permissions = $permissions->where('name','LIKE',"%{$keyword}%")->orWhere('label','LIKE',"%{$keyword}%");
        }

        $permissions = $permissions->latest()->paginate(20);

        return view('admin.permission.all',compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name' =>['required','string','unique:permissions'],
            'label' =>['required','max:255']
        ]);

        Permission::create($data);
        alert()->success('دستری جدید با موفقیت ایجد شد');
        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' =>['required','string',Rule::unique('permissions')->ignore($permission->id)],
            'label' =>['required','max:255']
        ]);

        $permission->update($data);
        alert()->success('دستری جدید با موفقیت ویرایش شد');
        return redirect(route('permission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
      $permission->delete();
        alert()->success('دستری جدید با موفقیت حذف شد');
        return redirect(route('permission.index'));
    }
}
