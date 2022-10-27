<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GuestUser;
use App\Models\Menu;
use App\Models\Mesages;
use App\Models\Messages;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Slider;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $categorys = Category::where('parent_id', 0)->take(5)->get();
        $sliders = Slider::latest()->get();
        $sales = Sale::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        return view('customer.dashboard', compact('sliders', 'categorys', 'sales', 'productsRecommend'));
    }

    public function dashboard()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->take(5)->get();
        $sales = Sale::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        $numberWishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $numberOrder = Orders::where('user_id', Auth::user()->id)->count();
        return view('customer.home.home', compact('sliders', 'categorys', 'sales', 'productsRecommend', 'menuLimit', 'numberWishlist', 'numberOrder'));
    }

    public function category($slug, $id)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $id)->paginate(12);
        $numberWishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $numberOrder = Orders::where('user_id', Auth::user()->id)->count();
        return view('customer.product.category_product', compact('categorys', 'menuLimit', 'products', 'numberWishlist', 'numberOrder'));
    }

    public function saleDetails($id)
    {
        $sale = Sale::where('id', $id)->first();
        $product = Product::where('id', $sale->product_id)->first();
        $categorys = Category::where('parent_id', 0)->get();
        $category = Category::where('id', $sale->category_id)->first();
        $product->update([
            'views_count' => $product->views_count + 1
        ]);
        $numberWishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $numberOrder = Orders::where('user_id', Auth::user()->id)->count();
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        return view('customer.product.sale_details', compact('menuLimit', 'categorys', 'sale', 'product', 'category', 'numberWishlist', 'numberOrder'));
    }

    public function productDetails($id)
    {
        $product = Product::where('id', $id)->first();
        $categorys = Category::where('parent_id', 0)->get();
        $product->update([
            'views_count' => $product->views_count + 1
        ]);
        $category = Category::where('id', $product->category_id)->first();
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        $numberWishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $numberOrder = Orders::where('user_id', Auth::user()->id)->count();
        return view('customer.product.product_details', compact('categorys', 'menuLimit', 'product', 'category', 'numberWishlist', 'numberOrder'));
    }

    public function information()
    {
        return view('customer.user.information');
    }

    public function postInformation(Request $request)
    {
        GuestUser::findOrFail(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('customerHome');
    }

    public function password()
    {
        return view('customer.user.password');
    }

    public function postPassword(Request $request)
    {
        if (Hash::check($request->password, $request->user()->password)) {
            if ($request->password_new == $request->confim_password) {
                GuestUser::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($request->password_new),
                ]);
                return redirect()->route('customerHome');
            } else {
                Session::put('messager', 'Xác nhận mật khẩu mới không đúng. Vui lòng thử lại!');
                return redirect()->route('password');
            }
        } else {
            Session::put('message', 'Mật khẩu không đúng.Vui lòng thử lại!');
            return redirect()->route('password');
        }
    }
    public function cart()
    {
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        return view('customer.order.cart', compact('menuLimit'));
    }

    public function wishlist($name, $id)
    {
        if ($name == 'sale') {
            $sale = Sale::where('id', $id)->first();
            Wishlist::create([
                'price' => $sale->price_new,
                'user_id' => auth()->id(),
                'product_id' => $sale->product_id,
                'amount' => '1',
                'sale_id' => $sale->id
            ]);
        } else {
            $product = Product::where('id', $id)->first();
            Wishlist::create([
                'price' => $product->price,
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'amount' => '1',
                'sale_id' => '0'
            ]);
        }
        return redirect()->route('customer.wishlist');
    }

    public function postWishlist()
    {
        $sales = [];
        $products = [];
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        foreach ($wishlists as $wishlist) {
            if(!empty($wishlist->sale_id)){
                $sale = Sale::findOrFail($wishlist->sale_id);
                array_push($sales, $sale);
            }else {
                $product = Product::findOrFail($wishlist->product_id);
                array_push($products, $product);
            }
        }
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        // dd($sales,$products);
        return view('customer.order.wishlist', compact('menuLimit', 'sales', 'products', 'wishlists'));
    }
}
