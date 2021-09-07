@extends('master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/form.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/dark-form.css') }}">
    <style>
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }
        .login-box,
        .box {
            position: relative;
            top: 3em;
        }

        .login-box {
            display: none;
        }
    </style>
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Đăng Nhập</title>
@endsection

@section('content')
    <div class="alert alert-danger login-box">
        {{ "abc" }}
    </div>
    @if (session('noti'))
        <div class="alert alert-success box">
            {{ session('noti') }}
        </div>
    @endif

    @if (session('alert'))
        <script>
            let x = document.querySelector('.login-box');
            x.style.display = "block";
            x.innerHTML = "{{ session('alert') }}";
        </script>
    @endif
    {{-- <div class="form-dang-nhap">
        <form action="{{ route('postLogin') }}" method="POST" onsubmit="return login()">
            {{ csrf_field() }}
            <h1>Đăng Nhập</h1>
            <div class="div-input">
                <label for="username" class="myLabel">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="input" maxlength="50">
                <p id="invalid-name" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="pass" class="myLabel">Mật khẩu</label>
                <input type="password" name="pass" id="pass" class="input" maxlength="32">
                <p id="invalid-pass" class="error">ok</p>
            </div>
            <p><a href="{{ route('recovery') }}">Quên mật khẩu?</a></p>
            <p>Chưa có tài khoản? <a href="{{ route('signin') }}">Đăng ký</a></p>
            <div class="div-btn">
                <input type="submit" value="Đăng nhập" class="input-button">
            </div>
        </form>
    </div> --}}
    <div class="dark-form">
        <form action="{{ route('postLogin') }}" method="POST" onsubmit="return login()">
            {{ csrf_field() }}
            <h1>Đăng Nhập</h1>
            <input type="text" name="username" id="username" class="input" 
                   maxlength="20" placeholder="Tên tài khoản">
            <p id="invalid-name" class="error">ok</p>
            <input type="password" name="pass" id="pass" class="input" 
                   maxlength="32" placeholder="Mật khẩu">
            <p id="invalid-pass" class="error">ok</p>
            <p><a href="{{ route('recovery') }}">Quên mật khẩu?</a></p>
            <p>Chưa có tài khoản? <a href="{{ route('signin') }}">Đăng ký</a></p>
            <input type="submit" value="Đăng nhập" class="input-button">
        </form>
    </div>
@endsection