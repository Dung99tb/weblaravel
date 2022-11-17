@extends('layouts.master')
@section('title')
    <title> Giỏ hàng</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/customer/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
@endsection
@section('js')
    {{-- <script src="{{ asset('customer/home/home.js') }}"></script> --}}
@endsection
@section('content')
    <section id="cart_items">
        <div class="container d-flex justify-content-between">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
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
                                <td><img class="sale_image image" src="{{ $sale->feature_image_path }}" alt="" style="width: 160px">
                                </td>
                                <td class="cart_product" style="padding-top: 28px;">{{ $sale->name }}</td>
                                <td class="cart_price">{{ number_format($sale->price_new) . ' VNĐ' }}</td>
                                @foreach ($orders as $order)
                                    @if ($order->sale_id == $sale->id)
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href=""> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                    value="{{ $order->amount }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href=""> - </a>
                                            </div>
                                        </td>
                                        <td>{{ number_format($order->price) . ' VNĐ' }}</td>
                                        <td>
                                            <a data-url=""
                                                class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                        @foreach ($products as $product)
                            <tr>
                                <td><img class="sale_image" src="{{ $product->feature_image_path }}" alt="">
                                </td>
                                <td class="cart_product" style="padding-top: 28px;">{{ $product->name }}</td>
                                <td class="cart_price">{{ number_format($product->price) . ' VNĐ' }}</td>
                                @foreach ($orders as $order)
                                    @if ($order->product_id == $product->id && $order->sale_id == 0)
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <a class="cart_quantity_up" href=""> + </a>
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                    value="{{ $order->amount }}" autocomplete="off" size="2">
                                                <a class="cart_quantity_down" href=""> - </a>
                                            </div>
                                        </td>
                                        <td>{{ number_format($order->price) . ' VNĐ' }}</td>
                                        <td>
                                            <a data-url=""
                                                class="btn btn-danger action_delete">Xóa</a>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        <tr class="total_cart">
                            <td>Tổng</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ number_format($orders->sum('price')) . ' VNĐ' }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="btn_shopping_cart">
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalConfirm">Xác
                    nhận</button>
            </div>
        </div>
        @include('customer.modal.modal_confirm')
    </section>
@endsection
