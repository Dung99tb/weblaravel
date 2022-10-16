<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <style>
        body {
            background-image: linear-gradient(to left top, #17a2b8, #14abc4, #12b3d1, #11bcde, #12c5eb);
            height: 100vh;
        }

        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D;
            color: #fff;
        }

        .btn-twitter {
            background-color: #42AEEC;
            color: #fff;
        }
    </style>
</head>

<body>
        <div class="container">
            <article class="card-body mx-auto bg-light" style="max-width: 400px;">
                <form id="register-form" class="form" action="{{ route('postRegister') }}" method="POST">
                    @csrf
                    <h4 class="card-title mt-3 text-center">Tạo tài khoản</h4>
                    <p class="text-center">Bắt đầu tạo tài khoản miễn phí của bạn</p>
                    <p>
                        <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Đăng nhập
                            với Twitter</a>
                        <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Đăng
                            nhập với facebook</a>
                    </p>
                    <p class="divider-text">
                        <span class="bg-light">Hoặc</span>
                    </p>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name" class="form-control" placeholder="Nhập tên" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Nhập email" type="email">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password" class="form-control" placeholder="Nhập mật khẩu" type="password">
                    </div> <!-- form-group// -->
                    <?php
                            $messager = Session::get('messager');
                            if ($messager) {
                                echo $messager;
                                Session::put('message', null);
                            }
                            ?>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="confim_password" class="form-control" placeholder="Xác nhận mật khẩu"
                            type="password">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Tạo tài khoản </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Bạn đã có tài khoản ? <a href="{{ route('loginAdmin') }}">Đăng nhập</a> </p>
                </form>
                {{-- </div> --}}
            </article>
        </div>
    <!--container end.//-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
