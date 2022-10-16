@extends('layouts.master')
@section('title')
    <title>Danh sách sản phẩm yêu thích</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/customer/customer.css') }}">
@endsection
@section('js')
    <script src="{{ asset('customer/home/home.js') }}"></script>
@endsection
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td><input type="checkbox"></td>
                            <td class="image">Hình ảnh</td>
                            <td class="name">Sản phẩm</td>
                            <td class="price">Đơn giá</td>
                            <td class="quantity">Số lượng</td>
                            <td>Số tiền</td>
                            <td>Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $wishlist)
                            @if ($wishlist->sale_id != 0)
                                @foreach ($sales as $sale)
                                {{-- {{$sale}} --}}
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><img class="sale_image" src="{{ $sale->feature_image_path }}" alt="">
                                        </td>
                                        <td class="cart_product">{{ $sale->name }}</td>
                                        <td class="cart_price">{{ number_format($sale->price_new) . ' VNĐ' }}</td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href=""> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                    value="{{ $wishlist->amount }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href=""> - </a>
                                            </div>
                                        </td>
                                        <td>{{ $wishlist->price }}</td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($products as $product)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><img class="sale_image" src="{{ $product->feature_image_path }}" alt="">
                                        </td>
                                        <td class="cart_product">{{ $product->name }}</td>
                                        <td class="cart_price">{{ number_format($product->price) . ' VNĐ' }}</td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href=""> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                    value="{{ $wishlist->amount }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href=""> - </a>
                                            </div>
                                        </td>
                                        <td>{{ $wishlist->price }}</td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
