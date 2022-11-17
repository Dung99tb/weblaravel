<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
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
        $numberWishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $numberOrder = Orders::where('user_id', Auth::user()->id)->count();
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
        return view('customer.order.wishlist', compact('menuLimit', 'sales', 'products', 'wishlists', 'numberWishlist', 'numberOrder'));
    }

    public function destroyWishlist($id)
    {
        dd('ok');
        Wishlist::findOrFail($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
}
