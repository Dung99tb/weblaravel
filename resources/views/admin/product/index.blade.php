@extends('layouts.admin')
@section('title')
<title>Danh sách sản phẩm</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('js')
<script src="{{asset('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('admins/main.js') }}"></script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'sản phẩm'])
   <!-- /.content-header -->
   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Thêm</a>
         </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Action</th>
                        <th scope="col">Sale</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $productItem)
                        <tr>
                            <th scope="row">{{$productItem->id}}</th>
                            <td>{{$productItem->name}}</td>
                            <td>{{number_format($productItem->price).' VNĐ'}}</td>
                            <td><img class="product_image" src="{{$productItem->feature_image_path}}" alt="" ></td>
                            <td>{{optional($productItem->category)->name}}</td>
                            <td>{{$productItem->amount}}</td>
                            <td>
                                <a href="{{route('product.edit', ['id' => $productItem->id])}}" class="btn btn-default">Edit</a>
                                <a data-url="{{route('product.delete', ['id' => $productItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                            </td>
                            <td>
                              <a href="{{route('sales.create', ['id' => $productItem->id])}}" class="btn btn-primary">Sale</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
              {{$products->links('pagination::bootstrap-4')}}
            </div>
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection
