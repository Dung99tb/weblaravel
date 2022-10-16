@extends('layouts.admin')
@section('title')
    <title>Danh sách user</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admins/main.js') }}"></script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                @include('partials.content-header', ['name' => 'Danh sách', 'key' => 'user'])
            </div>
            <div class="card-body">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('user.create') }}" class="btn btn-success float-right m-2">Thêm user</a>
                            </div>
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên user</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}"
                                                        class="btn btn-default">Edit</a>
                                                    <a data-url="{{ route('user.delete', ['id' => $user->id]) }}"
                                                        class="btn btn-danger action_delete">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12 d-flex justify-content-center">
                                {{ $users->links('pagination::bootstrap-4') }}
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
