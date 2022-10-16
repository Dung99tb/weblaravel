@extends('layouts.admin')
@section('title')
    <title>Thêm user</title>
@endsection
@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admins/user/user.css')}}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                @include('partials.content-header', ['name' => 'Thêm', 'key' => 'user'])
            </div>
            <div class="card-body">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên user</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Nhập tên user" value="{{ old('name') }}">
                                        {{-- @error('name')
                                            <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Nhập tên email" value="{{ old('email') }}">
                                        {{-- @error('name')
                                            <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Nhập password">
                                        {{-- @error('name')
                                            <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                        @enderror --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn vai trò</label>
                                        <select name="role_id[]" id="" class="form-control select2_init" multiple>
                                            <option value=""></option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tạo User</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            </div>
          </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admins/user/user.js')}}"></script>
@endsection
