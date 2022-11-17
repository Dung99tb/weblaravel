@extends('layouts.master')
@section('title')
    <title>Danh sách sản phẩm yêu thích</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/customer/customer.css') }}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('js')
    <script src="{{ asset('customer/home/home.js') }}"></script>
    <script src="{{ asset('customer/customer/customer.js') }}"></script>
    <script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@endsection
@section('content')
    <section id="cart_items">
        <div class="container d-flex justify-content-between">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td><input type="checkbox" class="check_all"></td>
                            <td class="image" style="width: 160px">Hình ảnh</td>
                            <td class="name">Sản phẩm</td>
                            <td class="price">Đơn giá</td>
                            <td class="quantity">Số lượng</td>
                            <td>Số tiền</td>
                            <td>Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td><input type="checkbox" class="checkbox_childrent"></td>
                                <td><img class="sale_image image" src="{{ $sale->feature_image_path }}" alt="" style="width: 160px">
                                </td>
                                <td class="cart_product" style="padding-top: 28px;">{{ $sale->name }}</td>
                                <td class="cart_price">{{ number_format($sale->price_new) . ' VNĐ' }}</td>
                                @foreach ($wishlists as $wishlist)
                                    @if ($wishlist->sale_id == $sale->id)
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href=""> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                    value="{{ $wishlist->amount }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href=""> - </a>
                                            </div>
                                        </td>
                                        <td>{{number_format( $wishlist->price ) . ' VNĐ' }}</td>
                                        <td>
                                            <a data-url="{{route('customer.wishlist.delete', ['id' => $wishlist->id])}}" class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                        @foreach ($products as $product)
                            <tr>
                                <td><input type="checkbox" class="checkbox_childrent"></td>
                                <td><img class="sale_image" src="{{ $product->feature_image_path }}" alt="">
                                </td>
                                <td class="cart_product" style="padding-top: 28px;">{{ $product->name }}</td>
                                <td class="cart_price">{{ number_format($product->price) . ' VNĐ' }}</td>
                                @foreach ($wishlists as $wishlist)
                                    @if ($wishlist->product_id == $product->id && $wishlist->sale_id == 0)
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href=""> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                    value="{{ $wishlist->amount }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href=""> - </a>
                                            </div>
                                        </td>
                                        <td>{{number_format( $wishlist->price ) . ' VNĐ' }}</td>
                                        <td>
                                            <a data-url="{{route('customer.wishlist.delete', ['id' => $wishlist->id])}}" class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="btn_shopping_cart">
                <a href="#" class="btn btn-default add-to-cart"><i
                    class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
