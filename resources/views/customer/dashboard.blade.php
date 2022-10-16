<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ</title>
    <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i>
                                        {{ getConfigValueFromSettingTable('phone') }}</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>
                                        {{ getConfigValueFromSettingTable('email') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('customer.login') }}"><i class="fa fa-star"></i> Danh sách yêu thích</a></li>
                                <li><a href="{{ route('customer.login') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <li><a href="{{ route('customer.login') }}"><i class="fa fa-lock"></i> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{route('home')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    @include('customer.home.components.slider')

    <section>
        <div class="container">
            <div class="row">
				@include('customer.partials.sidebar')
                <div class="col-sm-9 padding-right">
					<div class="features_items">   
						<h2 class="title text-center">Sale</h2>
						@foreach ($sales as $sale)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="{{ route('customer.login') }}">
											<img src="{{ $sale->feature_image_path }}" alt="" />
											</a>
											<h2>{{number_format($sale->price_new).' VNĐ'}}</h2>
											<h4>{{number_format($sale->price_old).' VNĐ'}}</h4>
											<p>{{$sale->name}}</p>
											<a href="{{ route('customer.login') }}" class="btn btn-default add-to-cart"><i
													class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="{{ route('customer.login') }}"><i class="fa fa-heart"></i></i>Thêm vào danh sách yêu thích</a></li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach
					</div>

					<div class="category-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								@foreach ($categorys as $indexCategory => $category)
									<li class="{{ $indexCategory == 0 ? 'active' : '' }}"><a href="#category_tab_{{ $category->id }}"
											data-toggle="tab">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="tab-content">
							@foreach ($categorys as $indexCategoryChildrent => $categoryChildrent)
								<div class="tab-pane fade {{ $indexCategoryChildrent == 0 ? 'active in' : '' }}"
									id="category_tab_{{ $categoryChildrent->id }}">
									@foreach ($categoryChildrent->categoryChildrent as $categoryProduct)
										@foreach ($categoryProduct->categoryProducts as $productItemTabs)
											<div class="col-sm-3">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<a href="{{ route('customer.login') }}">
																<img src="{{ $productItemTabs->feature_image_path }}" alt="" />
															</a>
															<h2>{{ number_format($productItemTabs->price) . ' VNĐ' }}</h2>
															<p>{{ $productItemTabs->name }}</p>
															<a href="{{ route('customer.login') }}" class="btn btn-default add-to-cart"><i
																	class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
														</div>
													</div>
												</div>
											</div>
										@endforeach
									@endforeach
					
								</div>
							@endforeach
						</div>
					</div>					
					<div class="recommended_items">
						<h2 class="title text-center">Sản phẩm đề xuất</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
					
								@foreach ($productsRecommend as $keyRecommend => $recommendItem)
									@if ($keyRecommend % 3 == 0)
										<div class="item {{ $keyRecommend == 0 ? 'active' : '' }}">
									@endif
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{ route('customer.login') }}">
													<img class="img_recommend" src="{{ $recommendItem->feature_image_path }}" alt="" />
													</a>
													<h2>{{ number_format($recommendItem->price) . ' VNĐ' }}</h2>
													<p>{{ $recommendItem->name }}</p>
													<a href="{{ route('customer.login') }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
					
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
													<li><a href="{{ route('customer.login') }}"><i class="fa fa-heart"></i></i>Thêm vào danh sách yêu thích</a></li>
												</ul>
											</div>
										</div>
										
									</div>
					
									@if ($keyRecommend % 3 == 2)
							</div>
							@endif
							@endforeach
						</div>
					</div>
					<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
					</div>
					</div>
					

                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('eshopper/js/main.js') }}"></script>
</body>

</html>
