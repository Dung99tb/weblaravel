<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductOrders;
use App\Models\Sale;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createCart($name, $id, Request $request)
    {
        if ($name == 'sale') {
            $sale = Sale::findOrFail($id);
            $amount = Product::where('id', $sale->product_id)->first()->amount;
            if ($request->amount_customer <= $amount) {
                ProductOrders::create([
                    'product_id' => $sale->product_id,
                    'sale_id' => $id,
                    'amount' => $request->amount_customer,
                    'price' => $sale->price_new * $request->amount_customer,
                    'user_id' => auth()->id(),
                ]);

                return redirect()->route('cart');
            } else {

                return redirect()->route('sale.details');
            }
        } else {
            $product = Product::findOrFail($id);
            if($request->amount_customer <= $product->amount) {
                ProductOrders::create([
                    'product_id' => $id,
                    'sale_id' => '0',
                    'amount' => $request->amount_customer,
                    'price' => $product->price * $request->amount_customer,
                    'user_id' => auth()->id(),
                ]);

                return redirect()->route('cart');
            } else {
                return redirect()->route('product.details');
            }
        }   
    }

    public function cart()
    {
        $sales = [];
        $products = [];
        $orders = ProductOrders::where('user_id', Auth::user()->id)->get();
        foreach ($orders as $order) {
            if(!empty($order->sale_id)){
                $sale = Sale::findOrFail($order->sale_id);
                array_push($sales, $sale);
            }else {
                $product = Product::findOrFail($order->product_id);
                array_push($products, $product);
            }
        }
        $numberWishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $numberOrder = Orders::where('user_id', Auth::user()->id)->count();
        $menuLimit = Menu::where('parent_id', 0)->take(3)->get();
        return view('customer.order.cart', compact('menuLimit', 'numberWishlist', 'numberOrder', 'orders', 'sales', 'products'));
    }

    public function confirmCart(Request $request)
    {
        $productOrder = ProductOrders::where('user_id', Auth::user()->id)->get();
        // dd('ODR'.Str::random(10));
        Orders::create([
            'order_code' => 'ODR'.Str::random(10),
            'address' => $request->address,
            'status' => '1',
            'time' => Carbon::now(),
            'phone' => $request->phone,
            'user_id' => Auth::user()->id,
            'price' => $request->price,
            'name' => $request->name,
            'shipping_fee' =>$request->ship,
        ]);
        $order = Orders::laster();
        DB::table('order_products')->create([
            'order_id' => $order->id,
            'product_order_id' => [$productOrder->id]
        ]);

        return redirect()->route('customerHome');
    }
}
