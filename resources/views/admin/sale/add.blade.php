@extends('layouts.admin')
@section('title')
    <title>Thêm sản phẩm sale</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admins/sale/sale.css')}}">
    <style>
        .select2-selection__choice {
            color: black !important;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Thêm', 'key' => 'sản phẩm sale'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('sales.store', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <label type="text" class="form-control"
                                name="name" value=" ">{{ $product->name }}</label>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <label type="number" class="form-control" name="amount" value="">{{ $product->amount }}</label>
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <label type="text" class="form-control" name="price_old" value="">{{ $product->price }}</label>
                            </div>
                            <div class="form-group">
                                <label>Giá sale</label>
                                <input type="text" class="form-control @error('price_new') is-invalid @enderror" name="price_new" placeholder="Nhập giá sale sản phẩm" value="{{ old('price_new') }}">
                                @error('price_new')
                                    <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <label type="text" class="form-control" name="category_id" value="">{{$category->name}}</label>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh đại diện</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                                <div class="col-md-12 container_image_avatar">
                                    <div class="row">
                                    <img class="image_avatar_sale" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh chi tiết</label>
                                <input type="file" class="form-control-file" multiple name="image_path[]">
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach ($product->images as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="image_detail_sale" src="{{$productImageItem->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" name="tags[]" id="tags_select_choose" multiple="multiple">
                                    @foreach ($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nội dung sản phẩm</label>
                                <textarea class="form-control"  name="content" id="" cols="30" rows="5" >{{$product->content}}</textarea>
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
