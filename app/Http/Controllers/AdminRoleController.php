<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class AdminRoleController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParents = Permission::where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionsParents'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);

        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $permissionsParents = Permission::where('parent_id', 0)->get();
        $role = $this->role->findOrFail($id);
        $permissionChecked = $role->permissions;
        return view('admin.role.edit', compact('permissionsParents', 'role', 'permissionChecked'));
    }

    public function update(Request $request,$id)
    {
        $this->role->findOrFail($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role = $this->role->findOrFail($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $this->role->findOrFail($id)->delete();
        DB::table('permission_role')->where('role_id', $id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
}
