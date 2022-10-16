@extends('layouts.master')
@section('title')
    <title> Giỏ hàng</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
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
                            <td class="image">Sản phẩm</td>
                            <td class="image">Hình ảnh</td>
                            {{-- <td class="description"></td> --}}
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="cart_description">
                                <h4><a href="">Colorblock Scuba</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/one.png" alt=""></a>
                            </td>
                            <td class="cart_price">
                                <p>$59</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                        autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$59</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td class="cart_description">
                                <h4><a href="">Colorblock Scuba</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_product">
                                <a href=""><img src="images/cart/two.png" alt=""></a>
                            </td>
                            <td class="cart_price">
                                <p>$59</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                        autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$59</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
           
            <div class="col-sm-8">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="number" class="form-control " name="price" placeholder="Nhập số điện thoại của bạn" value="{{ old('') }}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ: </label>
                    <input type="text" class="form-control"
                        name="name" placeholder="Nhập địa chỉ của bạn" value="{{ old('') }}">
                </div>
            </div>
            
            <div>
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Thành tiền <span>$59</span></li>
                            <li>Thuế VAT <span>$2</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Tổng tiền <span>$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Xác nhận</a>
                        <a class="btn btn-default check_out" href="">Hủy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
