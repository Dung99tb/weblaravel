@extends('layouts.master')
@section('title')
    <title>Chi tiết sản phẩm</title>
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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ $product->feature_image_path }}" alt="" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                      <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    
                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2>{{$product->name}}</h2>
                            <p>{{$product->content}}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
                                <span>{{number_format($product->price).' VNĐ'}}</span>
                                <br>
                                <label>Số lượng:</label>
                                <input type="text" value="1" name="amount_customer" />
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </span>
                            <p><b>Còn:</b>{{$product->amount}}</p>
                            <p><b>Tình trạng:</b> New</p>
                            <p><b>Danh mục: </b>{{$category->name}}</p>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#tag" data-toggle="tab">Sản phẩm tương tự</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content"> 
                        <div class="tab-pane fade" id="tag" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="images/home/gallery1.jpg" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>
                                
                                <form action="#">
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->        
            </div>
        </div>
    </div>
</section>
@endsection
