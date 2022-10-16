@extends('layouts.admin')
@section('title')
    <title>Thêm slider</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Thêm', 'key' => 'slider'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên slider" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group @error('description') is-invalid @enderror">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group"@error('image_path') is-invalid @enderror">
                                <label>Hình ảnh slider</label>
                                <input type="file" class="form-control-file" name="image_path">
                                @error('image_path')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
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
    <script src="https://cdn.tiny.cloud/1/9us2b5cik9wdi71saqrw94hzbiqgoq82qa2in05jg93gq30a/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
