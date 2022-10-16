<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{getConfigValueFromSettingTable('phone')}}</a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> {{getConfigValueFromSettingTable('email')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{getConfigValueFromSettingTable('facebook')}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{getConfigValueFromSettingTable('twitter')}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="eshopper/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('customer.wishlist')}}"><i class="fa fa-star"></i> Danh sách yêu thích <span class="badge badge-danger navbar-badge">{{$numberWishlist}}</span></a></li>
                            <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span class="badge badge-danger navbar-badge">{{$numberOrder}}</span></a></li>
                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-gears"></i>Cài đặt</a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                  <li><a href="{{route('information')}}" class="dropdown-item"><i class="fa fa-user"></i>Tài khoản </a></li>
                                  <li><a href="{{route('password')}}" class="dropdown-item"><i class="fa fa-key"></i>Đặt lại mật khẩu</a></li>
                                  <li><a href="{{route('customer.logout')}}" class="dropdown-item"><i class="fa fa-crosshairs"></i> Đăng xuất</a></li>
                                </form>
                                </ul>
                              </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                   @include('customer.components.main_menu')
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->