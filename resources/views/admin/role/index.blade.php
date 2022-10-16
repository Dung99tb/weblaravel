@extends('layouts.admin')
@section('title')
<title>Danh sách vai trò</title>
@endsection
@section('css')
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
   @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'vai trò'])
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
           <a href="{{ route('roles.create') }}" class="btn btn-success float-right m-2">Thêm</a>
         </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên vai trò</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>
                                <a href="{{route('roles.edit',['id' => $role->id])}}" class="btn btn-default">Edit</a>
                                <a href="" data-url="{{route('roles.delete',['id' => $role->id])}}" class="btn btn-danger action_delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                {{ $roles->links('pagination::bootstrap-4') }}
            </div>
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection
