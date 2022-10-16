<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GuestUserController extends Controller
{
    private $guestUser;
    public function __construct(GuestUser $guestUser)
    {
        $this->guestUser = $guestUser;
    }

    public function login()
    {
        return view('customer.login');
    }

    public function register()
    {
        return view('customer.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function postRegister(Request $request)
    {
        if($request->password == $request->confim_password) {
            GuestUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('customer.login');
        } else {
            Session::put('messager', 'Xác nhận mật khẩu không đúng');
            return redirect()->route('customer.register');
        }
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        $credentials = $request->only('email', 'password');
        if(Auth::guard('guest_user')->attempt($credentials, $remember)) {
            return redirect()->route('customerHome');
        }else{
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng');
            return redirect()->route('customer.login');
        }
        
    }

}
