<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đặt lại mật khẩu</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .pass_show {
            position: relative
        }

        .pass_show .ptxt {

            position: absolute;

            top: 50%;

            right: 10px;

            z-index: 1;

            color: #f36c01;

            margin-top: -10px;

            cursor: pointer;

            transition: .3s ease all;

        }

        .pass_show .ptxt:hover {
            color: #333333;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <!-- left column -->
            <div class="col-md-4 ">
                <div class="card card-primary align-self-center">
                    <div class="card-header">
                        <h3 class="card-title text-center">Đặt lại mật khẩu</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form" action="{{ route('customer.password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="container">
                                <label>Mật khẩu hiện tại:</label>
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                                <div class="form-group pass_show">
                                    <input type="password" value="" class="form-control"
                                        placeholder="Nhập mật khẩu hiện tại của bạn" name="password">
                                </div>
                                <label>Mật khẩu mới</label>
                                <div class="form-group pass_show">
                                    <input type="password" value="" class="form-control"
                                        placeholder="Nhập mật khẩu mới" name="password_new">
                                </div>
                                <label>Xác nhận mật khẩu mới</label>
                                <?php
                                $messager = Session::get('messager');
                                if ($messager) {
                                    echo $messager;
                                    Session::put('messager', null);
                                }
                                ?>
                                <div class="form-group pass_show">
                                    <input type="password" value="" class="form-control"
                                        placeholder="Xác nhận mật khẩu mới" name="confim_password">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.pass_show').append('<span class="ptxt">Hiện</span>');
        });

        $(document).on('click', '.pass_show .ptxt', function() {

            $(this).text($(this).text() == "Hiện" ? "Ẩn" : "Hiện");

            $(this).prev().attr('type', function(index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });

        });
    </script>
</body>

</html>
