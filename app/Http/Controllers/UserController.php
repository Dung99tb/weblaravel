<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = $this->adminUser->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach($request->role_id);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $roleUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user', 'roleUser'));
    }

    public function update($id, Request $request)
    {
        $this->user->findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user = $this->user->findOrFail($id);
        $user->roles()->sync($request->role_id);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $this->user->findOrFail($id)->delete();
        DB::table('role_user')->where('user_admin_id',$id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
}
