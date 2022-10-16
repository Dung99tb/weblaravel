@extends('layouts.admin')
@section('title')
<title>Danh sách sản phẩm sale</title>
@endsection
@section('css')
{{-- <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}"> --}}
<link rel="stylesheet" href="{{asset('admins/sale/sale.css')}}">
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
   @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'sản phẩm sale'])
   <!-- /.content-header -->
   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
         </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá cũ</th>
                        <th scope="col">Giá sale</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $saleItem)
                        <tr>
                            <th scope="row">{{$saleItem->id}}</th>
                            <td>{{$saleItem->name}}</td>
                            <td>{{optional($saleItem->category)->name}}</td>
                            <td><img class="sale_image" src="{{$saleItem->feature_image_path}}" alt="" ></td>
                            <td>{{number_format($saleItem->price_old).' VNĐ'}}</td>
                            <td>{{number_format($saleItem->price_new).' VNĐ'}}</td>
                            <td>
                                <a href="{{route('sales.edit', ['id' => $saleItem->id])}}" class="btn btn-default">Edit</a>
                                <a data-url="{{route('sales.delete', ['id' => $saleItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
              {{ $sales->links('pagination::bootstrap-4') }}
          </div>
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection
