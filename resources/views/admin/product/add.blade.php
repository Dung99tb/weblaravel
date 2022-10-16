@extends('layouts.admin')
@section('title')
    <title>Thêm sản phẩm</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/product/add/add.css') }}" />
    <style>
        .select2-selection__choice {
            color: black !important;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Thêm', 'key' => 'sản phẩm'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group @error('category_id') is-invalid @enderror">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" class="form-control" name="amount" placeholder="Nhập số lượng sản phẩm" value="{{ old('amount') }}">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh đại diện</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh chi tiết</label>
                                <input type="file" class="form-control-file" multiple name="image_path[]">
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" name="tags[]" id="tags_select_choose"
                                    multiple="multiple">

                                </select>
                            </div>
                            <div class="form-group @error('content') is-invalid @enderror">
                                <label>Nội dung sản phẩm</label>
                                <textarea class="form-control" name="content" id="" cols="30" rows="5">{{ old('content') }}</textarea>
                                @error('content')
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
@endsection
