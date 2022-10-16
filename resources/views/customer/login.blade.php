<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>


    <!------ Include the above in your HEAD tag ---------->

    <body background="./images/pattern2.jpg">

        <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Đăng nhập hoặc tiếp tục đi tham quan <a
                            href="{{ route('home') }}">website</a></h4>.
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-xs-6">
                            <div class="well">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                                <form id="loginForm" class="form" action="{{ route('customer.postLogin') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username" class="control-label">Email</label>
                                        <input type="text" class="form-control" name="email" value=""
                                            required="" placeholder="Nhập email của bạn">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Nhập mật khẩu" value="" required="">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_me" id="remember_me"> Nhớ mật khẩu
                                        </label>
                                    </div>
                                    <button type="submit" value="login" name="submit"
                                        class="btn btn-success btn-block">Đăng nhập</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <p class="lead">Đăng ký ngay để <span class="text-success">NHẬN ƯU ĐÃI</span></p>
                            <ul class="list-unstyled" style="line-height: 2">
                                <li><span class="fa fa-check text-success"></span>Xem tất cả các đơn hàng của bạn</li>
                                <li><span class="fa fa-check text-success"></span> Miễn phí vận chuyển dưới 10km</li>
                                <li><span class="fa fa-check text-success"></span> Lưu lại các mục bạn yêu thích</li>
                                <li><span class="fa fa-check text-success"></span> Thanh toán nhanh chóng</li>
                                <li><span class="fa fa-check text-success"></span>Nhận quà <small>(chỉ khách hàng
                                        mới)</small></li>
                                <li><span class="fa fa-check text-success"></span>Giảm giá ngày lễ lên đến 30%</li>
                            </ul>
                            <p><a href="{{ route('customer.register') }}" class="btn btn-info btn-block">Đăng ký ngay
                                    !</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript"></script>
    </body>

</html>
