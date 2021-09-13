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
        <form action="{{ route('postCode') }}" method="POST">
            {{ csrf_field() }}
            <div class="div-input">
                <label for="code" class="myLabel">Mã xác nhận</label>
                <input type="text" name="code" id="code" class="input" maxlength="5" required>
                <p id="invalid-name" class="error">ok</p>
                <input type="hidden" name="recovery" value="{{ $recoveryCode }}">
                <input type="hidden" name="email" value="{{ $email }}">
            </div>
            <div class="div-btn">
                <input type="submit" value="Xác nhận" class="input-button">
            </div>
        </form>
    </div> --}}
    <div class="dark-form">
        <form action="{{ route('postCode') }}" method="POST">
            {{ csrf_field() }}
            <input type="text" name="code" id="code" class="input" 
                   placeholder="Mã xác nhận" maxlength="5" required>
            <p id="invalid-name" class="error">ok</p>
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="submit" value="Xác nhận" class="input-button">
        </form>
    </div>
@endsection