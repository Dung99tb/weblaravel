<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin cá nhân</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            background-color: rgb(134, 34, 7);
        }

        .contact {
            padding: 4%;
            height: 400px;
        }

        .col-md-3 {
            background: gainsboro;
            padding: 4%;
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .contact-info {
            margin-top: 10%;
        }

        .contact-info img {
            margin-bottom: 15%;
        }

        .contact-info h2 {
            margin-bottom: 10%;
        }

        .col-md-9 {
            background: #fff;
            padding: 3%;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .contact-form label {
            font-weight: 600;
        }

        .contact-form button {
            background: #25274d;
            color: #fff;
            font-weight: 600;
            width: 25%;
        }

        .contact-form button:focus {
            box-shadow: none;
        }

        .image_informaiton {
            width: 220px;
            height: 280px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container contact">
        <div class="row">
            <form action="{{route('post.information')}}" method="POST" enctype="multipart/form-data" style="width: 100%">
                @csrf
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="col-md-3 d-flex justify-content-center">
                        <div class="contact-info">
                            <img src="{{ asset('admins/images/user.png') }}" alt="image" class="image_informaiton" />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="contact-form">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fname">Họ và tên:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="phone">Số điện thoại:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        value="0{{Auth::user()->phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="address">Địa chỉ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{Auth::user()->address}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 text-center">
                                    <button type="submit" class="btn btn-default">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>

<!------ Include the above in your HEAD tag ---------->
