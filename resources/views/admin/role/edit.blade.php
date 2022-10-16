@extends('layouts.admin')
@section('title')
    <title>Chỉnh sửa vai trò</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admins/role/role.css')}}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Chỉnh sửa', 'key' => 'vai trò'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('roles.update',['id' => $role->id])}}" method="POST" enctype="multipart/form-data" style="width: 100%">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                    value="{{$role->name}}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea class="form-control" name="display_name" id="" cols="30" rows="3">{{$role->display_name}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="check_all">
                                        Chọn tất cả
                                    </label>
                                </div>
                                @foreach ($permissionsParents as $permissionsParent)
                                <div class="card border-primary mb-3 col-md-12">
                                    <div class="card-header">
                                        <label for="">
                                            <input type="checkbox" name="permission_id[]" 
                                            {{$permissionChecked->contains('id', $permissionsParent->id)?'checked':''}}
                                            class="checkbox_wrapper" value="{{$permissionsParent->id}}">
                                        </label>
                                        {{$permissionsParent->name}}
                                    </div>
                                    <div class="row">
                                        @foreach ($permissionsParent->permissionChildrent as $permissionChildrent)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label for="">
                                                    <input type="checkbox" name="permission_id[]"
                                                    {{$permissionChecked->contains('id', $permissionChildrent->id)?'checked':''}}
                                                    class="checkbox_childrent" id="" value="{{$permissionChildrent->id}}">
                                                </label>
                                                {{$permissionChildrent->name}}
                                            </h5>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>  
                                @endforeach
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{asset('admins/role/role.js')}}"></script>
@endsection
