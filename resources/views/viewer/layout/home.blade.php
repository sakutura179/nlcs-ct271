@extends('layouts.index')

@section('css')
    <style>
        h1 {
            text-align: center;
        }

        .content {
            padding: .5rem 2rem;
        }

        a {
            color: blue;
        }
    </style>
@endsection

@section('title')
    <title>Trang Cá Nhân</title>
@endsection

@section('content')
    <div class="content">
        @if (Auth::guard('viewer')->check())
            <h1>Thông tin cá nhân</h1>
            @if (isset($viewer_login->username))
                <p>Tên đăng nhập: {{$viewer_login->username}}</br>
                   Tên người dùng: {{$viewer_login->fullname}}</br>
                   Email: {{$viewer_login->email}}</br>
                   Ngày sinh: {{$viewer_login->birth_day}}</br> 
                <a href="{{ route('edit-viewer', ['id' => $viewer_login->username]) }}">
                    Chỉnh sửa thông tin cá nhân <i class="fas fa-user-cog    "></i></a></p>
            @endif
        @else
        {!!"<h1>Bạn chưa đăng nhập</h1>"!!}
        @endif
    </div>
@endsection