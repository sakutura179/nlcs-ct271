@extends('layouts.index')

@section('css')
    <style>
        h1 {
            text-align: center;
        }

        .content {
            padding: .5em 2em;
        }

        a {
            color: blue;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    {{-- dark mode --}}
    <link rel="stylesheet" href="{{ asset('css/front/mainPage.css') }}">
@endsection

@section('title')
    <title>Chỉnh Sửa Thông Tin</title>
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('content')
    <div class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif

        <div class="form">
            <h3>Chỉnh sửa thông tin tài khoản</h3>
            <form action="{{ route('post-edit-viewer') }}" method="post" onsubmit="return editViewer()">
                {{ csrf_field() }}
                <div class="div-input">
                    <label for="changePass" class="myLabel">
                        <input type="checkbox" name="changePass" id="changePass"> Đổi mật khẩu</label>
                    <label for="old_password" class="myLabel">Nhập mật khẩu cũ</label>
                    <input type="password" name="old_password" id="old_password" class="input pass" disabled="1">
                    <p id="invalid-old-pass" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="password" class="myLabel">Nhập mật khẩu mới</label>
                    <input type="password" name="password" id="password" class="input pass" disabled="1">
                    <p id="invalid-pass" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="re-password" class="myLabel">Nhập lại mật khẩu mới</label>
                    <input type="password" name="re-password" id="re-password" class="input pass" disabled="1">
                    <p id="invalid-re-pass" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeName" class="myLabel">
                        <input type="checkbox" name="changeName" id="changeName"> Chỉnh sửa họ tên</label>
                    <input type="text" name="fullname" id="fullname" class="input name" 
                            disabled="1" value="{{ $viewer->fullname }}">
                    <p id="invalid-fullname" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeEmail" class="myLabel">
                        <input type="checkbox" name="changeEmail" id="changeEmail"> Chỉnh sửa email</label>
                    <input type="email" name="email" id="email" class="input email"
                             disabled="1" value="{{ $viewer->email }}">
                    <p id="invalid-email" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeBirth" class="myLabel">
                        <input type="checkbox" name="changeBirth" id="changeBirth"> Chỉnh sửa ngày sinh</label>
                    <input type="date" name="birth_day" id="birth_day" class="input birth" 
                            disabled="1" value="{{ $viewer->birth_day }}">
                    <p id="invalid-bday" class="error">ok</p>
                </div>
                <input type="hidden" name="username" id="username" value="{{ $viewer->username }}">
                <div class="div-btn">
                    <input type="reset" value="Nhập lại" class="input-button">
                    <input type="submit" value="Chỉnh sửa" class="input-button">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script>
        $(document).ready(function () {
            $("#changePass").change(function () { 
                if ($(this).is(":checked")) {
                    $(".pass").removeAttr('disabled');
                } else {
                    $(".pass").attr('disabled', '1');
                }

            });

            $("#changeName").change(function () { 
                if ($(this).is(":checked")) {
                    $(".name").removeAttr('disabled');
                } else {
                    $(".name").attr('disabled', '1');
                }

            });

            $("#changeEmail").change(function () { 
                if ($(this).is(":checked")) {
                    $(".email").removeAttr('disabled');
                } else {
                    $(".email").attr('disabled', '1');
                }

            });

            $("#changeBirth").change(function () { 
                if ($(this).is(":checked")) {
                    $(".birth").removeAttr('disabled');
                } else {
                    $(".birth").attr('disabled', '1');
                }

            });
        });
    </script>
@endsection