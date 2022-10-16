<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function create()
    {
        return view('admin.permission.add');
    }

    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0
        ]);

        foreach($request->module_childrent as $module_childrent) {
            Permission::create([
                'name' => $module_childrent,
                'display_name' => $module_childrent,
                'parent_id' => $permission->id,
                'key_code' => $request->module_parent . '_' . $module_childrent
            ]);
        }

        return redirect()->route('permissions.create');
    }
}
