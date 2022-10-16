@extends('layouts.master')
@section('title')
    <title> Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
@endsection
@section('js')
    <script src="{{ asset('customer/home/home.js') }}"></script>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('customer.partials.sidebar')

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center"> Sản phẩm</h2>
                        @foreach ($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{route('product.details', ['id'=> $product->id])}}">
                                            <img src="{{ $product->feature_image_path }}" alt="" />
                                            </a>
                                            <h2>{{number_format($product->price).' VNĐ'}}</h2>
                                            <p>{{$product->name}}</p>
                                            <a href="{{route('cart')}}" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-heart"></i></i>Thêm vào danh sách yêu thích</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                       {{$products->links()}}
                    </div>
                    <!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
