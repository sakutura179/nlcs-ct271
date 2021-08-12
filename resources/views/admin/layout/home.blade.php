@extends('admin.layout.adminMaster')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('content')
    <p>Tài khoản đăng nhập: {{ auth('admin')->user()->username }}</p>
    <p>Loại tài khoản: {{ auth('admin')->user()->adminBelongsToRole->role_name }}</p>
@endsection

@section('lowerScript')
    <script>
        let name = document.getElementById('home');
        name.className = 'list active';
    </script>
@endsection