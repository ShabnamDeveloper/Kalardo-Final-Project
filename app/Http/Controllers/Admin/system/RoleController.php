<?php

namespace App\Http\Controllers\Admin\system;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-role')->only('index');
        $this->middleware('can:create-role')->only(['create','store']);
        $this->middleware('can:edit-role')->only(['update','edit']);
        $this->middleware('can:delete-role')->only('destroy');
    }

    public function index(Request $request)
    {
        $roles = Role::query();

        if ($keyword = $request->search) {
            $roles = $roles->where('name', 'LIKE', "%{$keyword}%")->orWhere('label', 'LIKE', "%{$keyword}%");
        }

        $roles = $roles->latest()->paginate(20);
        return view('admin.role.all', compact('roles'));

    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:150',
            'label' => 'required|max:150',
            'permissions' => ['required', 'array']

        ]);

        $role = Role::create($data);
        $role->permissions()->sync($data['permissions']);
        alert()->success('گروه بندی جدید با موفقیت ایجاد شد');
        return redirect(route('role.index'));
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required|max:150',
            'label' => 'required|max:150',
            'permissions' => ['required', 'array']

        ]);

        $role->update($data);
        $role->permissions()->sync($data['permissions']);
        alert()->success('گروه بندی با موفقیت ویرایش شد');
        return redirect(route('role.index'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        alert()->success('گروه بندی با موفقیت حذف شد');
        return redirect(route('admin.roles.index'));
    }
}
