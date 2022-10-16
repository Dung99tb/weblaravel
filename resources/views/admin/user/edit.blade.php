@extends('layouts.admin')
@section('title')
    <title>Chỉnh sửa user</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admins/user/user.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Chỉnh sửa', 'key' => 'user'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên user</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Nhập tên user" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Nhập tên email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Nhập password">
                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" id="" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach ($roles as $role)
                                        <option 
                                        {{$roleUser->contains('id', $role->id) ? 'selected': ''}}
                                         value="{{$role->id}}">{{$role->name}}</option>  
                                    @endforeach
                                </select>
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
    <script src="{{ asset('admins/user/user.js')}}"></script>
@endsection
