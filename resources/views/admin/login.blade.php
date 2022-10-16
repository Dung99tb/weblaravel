<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN LOGIN</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <style>
        body {
            background-image: linear-gradient(to left top, #17a2b8, #14abc4, #12b3d1, #11bcde, #12c5eb);
            height: 100vh;
        }

        #login .container #login-row #login-column .login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 400px;
            border: 1px solid #9C9C9C;
            background-image: linear-gradient(to bottom, #aec1c3, #a9b5b7, #bcc5c6, #cfd5d5, #e3e5e5);
        }

        #login .container #login-row #login-column .login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column .login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->

</head>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Chào mừng bạn đến với trang quản trị</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div class="login-box col-md-12">
                        <form id="login-form" class="form" action="{{ route('postLogin') }}" method="POST">
                            @csrf
                            <h3 class="text-center text-info">Đăng nhập</h3>
                            <?php
                            $message = Session::get('message');
                            if ($message) {
                                echo  $message;
                                Session::put('message', null);
                            }
                            ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Email: </label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password: </label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember_me" name="remember_me"
                                            type="checkbox"></span></label><br>
                                <label for="register" class="text-info"><span>Bạn chưa có tài khoản.</span> <a
                                        href="{{ route('register') }}"> Đăng ký ngay</a></label><br>
                            </div>
                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
