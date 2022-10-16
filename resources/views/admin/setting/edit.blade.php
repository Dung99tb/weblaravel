@extends('layouts.admin')
@section('title')
    <title>Sửa cài đặt</title>
@endsection
@section('css')
    {{-- <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('admins/setting/setting.css') }}" />
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Sửa', 'key' => 'cài đặt'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('setting.update',  ['id' => $settings->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text" class="form-control @error('config_key') is-invalid @enderror"
                                    name="config_key" placeholder="Nhập config key"  value="{{$settings->config_key}}">
                                    @error('config_key')
                                        <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                    @enderror
                            </div>
                            @if (request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text" class="form-control " name="config_value" value="{{$settings->config_value}}"
                                        placeholder="Nhập config value" @error('config_value') is-invalid @enderror>
                                    @error('config_value')
                                        <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif (request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <textarea class="form-control" name="config_value" placeholder="Nhập config value" rows="5"  @error('config_value') is-invalid @enderror>{{$settings->config_value}}</textarea>
                                    @error('config_value')
                                        <div class="alert" style="color: red; padding: 3px 5px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
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
