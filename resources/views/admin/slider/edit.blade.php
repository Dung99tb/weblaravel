@extends('layouts.admin')
@section('title')
    <title>Sửa slider</title>
@endsection
@section('css')
    <link href="{{ asset('admins/slider/slider.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Sửa', 'key' => 'slider'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.update', ['id' => $slider->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control" name="name" value="{{$slider->name}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control "  name="description" id="" cols="30" rows="3" >{{$slider->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh </label>
                                <input type="file" class="form-control-file" name="image_path">
                                <div class="col-md-12 container_image_avatar">
                                    <div class="row">
                                    <img class="slider_image" src="{{$slider->image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/product/add/add.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/9us2b5cik9wdi71saqrw94hzbiqgoq82qa2in05jg93gq30a/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
