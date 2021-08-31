@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
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
    
    <div class="form-dang-nhap">
        <form action="{{ route('postRecovery') }}" method="POST">
            {{ csrf_field() }}
            <div class="div-input">
                <label for="email" class="myLabel">Email đăng ký</label>
                <input type="email" name="email" id="email" class="input" maxlength="50" required>
                <p id="invalid-name" class="error">ok</p>
            </div>
            <div class="div-btn">
                <input type="submit" value="Gửi mã xác nhận" class="input-button">
            </div>
        </form>
    </div>
@endsection