@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin-form.css') }}">
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Đăng Ký</title>
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <div class="form">
        <h1>Đăng Ký Tài Khoản</h1>
        <form action="{{ route('postSignin') }}" method="POST" onsubmit="return viewer()">
            {{ csrf_field() }}
            <div class="div-input">
                <label for="username" class="myLabel">Tên tài khoản</label>
                <input type="text" name="username" id="username" class="input" 
                       value="{{ old('username') }}" maxlength="20">
                <p id="invalid-username" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="password" class="myLabel">Mật khẩu</label>
                <input type="password" name="password" id="password" class="input" maxlength="32">
                <p id="invalid-pass" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="re-password" class="myLabel">Nhập lại mật khẩu</label>
                <input type="password" name="re-password" id="re-password" class="input" maxlength="32">
                <p id="invalid-re-pass" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="fullname" class="myLabel">Họ tên</label>
                <input type="text" name="fullname" id="fullname" class="input" 
                       value="{{ old('fullname') }}" maxlength="50">
                <p id="invalid-fullname" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="email" class="myLabel">Email</label>
                <input type="email" name="email" id="email" class="input"
                       value="{{ old('email') }}" maxlength="100">
                <p id="invalid-email" class="error">ok</p>
            </div>
            <div class="div-input">
                <label for="birth_day" class="myLabel">Ngày sinh</label>
                <input type="date" name="birth_day" id="birth_day" class="input" value="{{ old('birth_day') }}">
                <p id="invalid-bday" class="error">ok</p>
            </div>
            <div class="div-btn">
                <input type="reset" value="Nhập lại" class="input-button">
                <input type="submit" value="Đăng ký" class="input-button">
            </div>
        </form>
    </div>
@endsection