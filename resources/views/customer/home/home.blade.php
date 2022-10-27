@extends('layouts.master')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('customer/home/home.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/slider/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('chat/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('chat/chatCustomer.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection
@section('js')
    <script src="{{ asset('customer/home/home.js') }}"></script>
    <script src="{{ asset('chat/chat.js') }}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.41/vue.cjs.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.3/socket.io.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.14.1/echo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.3/socket.io.js"></script> --}}
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
                    <div>
                        <img src="{{ asset('admins/images/chatbot.jpg') }}" alt="" id="myBtn">
                        <div id="myForm">
                            {{-- <form action="{{route('customer.sendchat')}}" method="POST"> --}}
                                {{-- @csrf --}}
                                <div class="card">
                                    <div class="card-header msg_head ">
                                        <div class="img_cont">
                                            <img src="{{ asset('admins/images/chatbot.jpg') }}"
                                                class="rounded-circle user_img">
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>Trò chuyện với chúng tôi</span>
                                            <p>Thường trả lời ngay</p>
                                        </div>
                                        <button id="btnClose"><i class="fas fa-minus"></i></button>
                                    </div>
                                    <div class="card-body msg_card_body">
                                        <div class="chat_body_admin">
                                            <div class="img_cont_msg">
                                                <img src="{{ asset('admins/images/chatbot.jpg') }}"
                                                    class="rounded-circle user_img_msg">
                                            </div>
                                            <div class="msg_cotainer">
                                                Xin chào, tôi có thể giúp gì cho bạn ?
                                            </div>
                                        </div>
                                        {{-- @foreach ($messages as $message) --}}
                                            <div class="chat_body_customer">
                                                <div class="msg_cotainer_send">
                                                    {{-- {{ $message->content }} --}}
                                                </div>
                                            </div>
                                        {{-- @endforeach --}}
                                        <div class="chat_body_admin">
                                            <div class="img_cont_msg">
                                                <img src="{{ asset('admins/images/chatbot.jpg') }}"
                                                    class="rounded-circle user_img_msg">
                                            </div>
                                            <div class="msg_cotainer">
                                                I am good too, thank you for your chat template
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer chat_footer_customer">
                                        <div class="input-group-append">
                                            <span class="input-group-text attach_btn"><i
                                                    class="fas fa-paperclip"></i></span>
                                        </div>
                                        <textarea v-model="message" @keyup.enter name="content" class="form-control type_msg" placeholder="Type your message..." style="width: 300px;"></textarea>
                                        <div class="input-group-append">
                                            {{-- <button @click="sendMessage" class="btn btn-primary">Send</button> --}}
                                            {{-- <span class="input-group-text send_btn"><i
                                                    class="fas fa-location-arrow"></i></span> --}}
                                        </div>
                                    </div>
                                </div>
                                {{-- </form> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
