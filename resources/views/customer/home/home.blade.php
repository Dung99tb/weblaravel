@extends('layouts.master')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
@endsection
@section('js')
    <script src="{{ asset('customer/home/home.js') }}"></script>
@endsection
@section('content')
    <!--slider-->
    @include('customer.home.components.slider')
    <!--/slider-->
    <section>
        <div class="container">
            <div class="row">
                @include('customer.partials.sidebar')
                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('customer.home.components.feature_item')
                    <!--features_items-->

                    <!--category-tab-->
                    @include('customer.home.components.category_tab')
                    <!--/category-tab-->

                    <!--recommended_items-->
                    @include('customer.home.components.recommend_product')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
@endsection
