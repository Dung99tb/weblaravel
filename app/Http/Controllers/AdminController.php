<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $sale;
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }
    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
        if($request->password == $request->confim_password) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('loginAdmin');
        } else {
            Session::put('messager', 'Xác nhận mật khẩu không đúng');
            return redirect()->route('register');
        }
    }

    public function postLogin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->route('dashboard');
        }else {
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng');
            return redirect()->route('loginAdmin');
        }
        
    }
    
    public function dashboard()
    {
        $sales = $this->sale->latest()->paginate(5);

        $products = Product::select(DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = Product::select(DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month - 1] = $products[$index];
        }
        return view('admin.dashboard.index', compact('sales', 'datas'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginAdmin');
    }

}
