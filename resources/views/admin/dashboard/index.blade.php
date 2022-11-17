@extends('layouts.admin')
@section('title')
    <title>Trang chu</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/dashboard/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('chat/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('chat/chatAdmin/chat.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Trang chủ', 'key' => ''])
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>Người dùng mới</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Số lượng truy cập</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Sản phẩm sale</h3>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá</th>
                                            <th>Sales</th>
                                            <th>Chi tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $saletItem)
                                            <tr>
                                                <td>{{ $saletItem->id }}</td>
                                                <td>{{ $saletItem->name }}</td>
                                                <td><img class="sale_image_dashboard"
                                                        src="{{ $saletItem->feature_image_path }}" alt=""></td>
                                                <td>{{ number_format($saletItem->price_old) . ' VNĐ' }}</td>
                                                <td>{{ number_format($saletItem->price_new) . ' VNĐ' }}</td>
                                                <td>
                                                    <a href="{{ route('sales.edit', ['id' => $saletItem->id]) }}"
                                                        class="btn btn-default">Edit</a>
                                                    <a data-url="{{ route('sales.delete', ['id' => $saletItem->id]) }}"
                                                        class="btn btn-danger action_delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Đơn hàng</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                                <td><span class="badge badge-success">Hoàn thành</span></td>
                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                        90,80,90,-70,61,-83,63</div>
                                                </td>
                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Chi tiết</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            @include('customer.modal.modal_order')
                        </div>
                    </section>
                    <section class="col-lg-5 connectedSortable">
                        <div id="chart-container"></div>
                        <!-- /.card -->
                        <!-- /.content -->
                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        {{-- </div> --}}
                        <!-- /.content-wrapper -->
                    </section>
                    <div>
                        <img src="{{ asset('admins/images/chatbot.jpg') }}" alt="" id="myBtn">
                        <div id="myForm">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title pl-1 left-column"><h5 >Tư vấn khách hàng</h5></div>
                                    <div class="d-flex justify-content-end"><button id="btnClose"><i class=" fas fa-minus"></i></button></div>
                                </div>
                                <div class="card-body">
                                    <div class="messaging">
                                        <div class="inbox_msg">
                                            <div class="inbox_people">
                                                <div class="headind_srch">
                                                    <div class="recent_heading">
                                                        <h4>Gần đây</h4>
                                                    </div>
                                                    <div class="srch_bar">
                                                        <div class="stylish-input-group">
                                                            <input type="text" class="search-bar"
                                                                placeholder="Search">
                                                            <span class="input-group-addon">
                                                                <button type="button"> <i class="fa fa-search"
                                                                        aria-hidden="true"></i> </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="inbox_chat">
                                                    <div class="chat_list active_chat">
                                                        <div class="chat_people">
                                                            <div class="chat_ib">
                                                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                <p>Test, which is a new approach to have all solutions
                                                                    astrology under one roof.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="chat_list">
                                                        <div class="chat_people">
                                                            <div class="chat_ib">
                                                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                <p>Test, which is a new approach to have all solutions
                                                                    astrology under one roof.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mesgs">
                                                <div class="msg_history">
                                                    <div class="incoming_msg">
                                                        <div class="received_msg">
                                                            <div class="received_withd_msg">
                                                                <p>Test which is a new approach to have all
                                                                    solutions</p>
                                                                <span class="time_date"> 11:01 AM | June 9</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="outgoing_msg">
                                                        <div class="sent_msg">
                                                            <p>Test which is a new approach to have all
                                                            </p>
                                                            <span class="time_date"> 11:01 AM | June 9</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="type_msg">
                                                    <div class="input_msg_write">
                                                        <input type="text" class="write_msg"
                                                            placeholder="Type a message" />
                                                        <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                                        <button class="msg_send_btn" type="button"><i
                                                                class="fa fa-paper-plane-o"
                                                                aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection

                @section('js')
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.41/vue.cjs.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.3/socket.io.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.14.1/echo.js"></script> --}}
                    <script src="{{ asset('chat/chat.js') }}"></script>
                    <script src="{{ asset('admins/dashboard/dashboard.js') }}"></script>
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/10.2.1/highcharts.js"></script>
                    <script>
                        var datas = <?php echo json_encode($datas); ?>;
                        Highcharts.chart('chart-container', {
                            title: {
                                text: 'New Product Growth, 2022'
                            },
                            subtitle: {
                                text: 'Source: Surfside Media'
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            },
                            yAxis: {
                                title: {
                                    text: 'Number of New Product'
                                }
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'middle'
                            },
                            plotOptions: {
                                series: {
                                    allowPointSelect: true
                                }
                            },
                            series: [{
                                name: 'New Product',
                                data: datas
                            }],
                            responsive: {
                                rules: [{
                                    condition: {
                                        maxWidth: 700
                                    },
                                    chartOptions: {
                                        legend: {
                                            layout: 'horizontal',
                                            align: 'center',
                                            verticalAlign: 'bottom'
                                        }
                                    }
                                }]
                            }
                        })
                    </script>
                @endsection
