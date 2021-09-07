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
    </style>
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Lấy lại mật khẩu</title>
@endsection

@section('content')
    {{-- <div class="form-dang-nhap">
        <form action="{{ route('postReset') }}" method="POST" onsubmit="return resetPass()">
            {{ csrf_field() }}
            <div class="div-input">
                <label for="password" class="myLabel">Nhập mật khẩu mới</label>
                <input type="password" name="password" id="password" class="input pass">
                <p id="invalid-pass" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="re-password" class="myLabel">Nhập lại mật khẩu mới</label>
                <input type="password" name="re-password" id="re-password" class="input pass">
                <p id="invalid-re-pass" class="error">ok</p>
            </div>
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="div-btn">
                <input type="submit" value="Đổi mật khẩu" class="input-button">
            </div>
        </form>
    </div> --}}
    <div class="dark-form">
        <form action="{{ route('postReset') }}" method="POST" onsubmit="return resetPass()">
            {{ csrf_field() }}
            <input type="password" name="password" id="password" 
                   placeholder="Nhập mật khẩu mới" class="input pass">
            <p id="invalid-pass" class="error">ok</p>

            <input type="password" name="re-password" id="re-password" 
                   placeholder="Nhập lại mật khẩu mới" class="input pass">
            <p id="invalid-re-pass" class="error">ok</p>

            <input type="hidden" name="email" value="{{ $email }}">

            <input type="submit" value="Đổi mật khẩu" class="input-button">
        </form>
    </div>
@endsection