@extends('layouts.admin')
@section('title')
<title>Danh sách cài đặt</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admins/setting/setting.css') }}">
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
   @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'cài đặt'])
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-12">
          <div class="btn-group float-right m-2">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              Thêm cài đặt
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li> <a href="{{ route('setting.create').'?type=Text' }}">Text</a></li>
              <li> <a href="{{ route('setting.create').'?type=Textarea' }}">Textarea</a></li>
            </ul>
          </div>
         </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Config key</th>
                        <th scope="col">Config value</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $settingItem)
                        <tr>
                            <th scope="row">{{$settingItem->id}}</th>
                            <td>{{$settingItem->config_key}}</td>
                            <td>{{$settingItem->config_value}}</td>
                            <td>
                                <a href="{{route('setting.edit', ['id' => $settingItem->id]).'?type='.$settingItem->type}}" class="btn btn-default">Edit</a>
                                <a href="" data-url="{{route('setting.delete', ['id' => $settingItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                {{ $settings->links('pagination::bootstrap-4') }}
            </div>
       </div>
       
     </div>
   </div>

 </div>

@endsection
