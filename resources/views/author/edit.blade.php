@extends('author.layout.authorMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Chỉnh Sửa Thông Tin</title>
@endsection

@section('content')
        
    <div class="container">
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
            <form action="{{ route('post-edit-author') }}" method="post" onsubmit="return editAuthor()">
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
                            disabled="1" value="{{ $author->fullname }}">
                    <p id="invalid-fullname" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeEmail" class="myLabel">
                        <input type="checkbox" name="changeEmail" id="changeEmail"> Chỉnh sửa email</label>
                    <input type="email" name="email" id="email" class="input email"
                             disabled="1" value="{{ $author->email }}">
                    <p id="invalid-email" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeBirth" class="myLabel">
                        <input type="checkbox" name="changeBirth" id="changeBirth"> Chỉnh sửa ngày sinh</label>
                    <input type="date" name="birth_day" id="birth_day" class="input birth" 
                            disabled="1" value="{{ $author->birth_day }}">
                    <p id="invalid-bday" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeAddress" class="myLabel">
                        <input type="checkbox" name="changeAddress" id="changeAddress"> Chỉnh sửa địa chỉ</label>
                    <input type="text" name="address" id="address" class="input address" 
                            disabled="1" value="{{ $author->address }}">
                    <p id="invalid-address" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changePhone" class="myLabel">
                        <input type="checkbox" name="changePhone" id="changePhone"> Chỉnh sửa số điện thoại</label>
                    <input type="tel" placeholder="012-345-6789" pattern="[0]{1}[0-9]{9}" 
                            name="phone_no" id="phone_no" class="input phone" 
                                disabled="1"  value="{{ $author->phone_no }}">
                    <p id="invalid-phone" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="changeBank" class="myLabel">
                        <input type="checkbox" name="changeBank" id="changeBank"> Chỉnh sửa số tài khoản ngân hàng</label>
                    <input type="tel" pattern="[0-9]{14}" name="b_account_no" 
                            id="b_account_no" class="input bank" disabled="1" value="{{ $author->b_account_no }}">
                    <p id="invalid-bank" class="error">ok</p>
                </div>
                <input type="hidden" name="username" id="username" value="{{ $author->username }}">
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
        let name = document.getElementById('home');
        name.className = 'list active';

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

            $("#changeAddress").change(function () { 
                if ($(this).is(":checked")) {
                    $(".address").removeAttr('disabled');
                } else {
                    $(".address").attr('disabled', '1');
                }

            });

            $("#changePhone").change(function () { 
                if ($(this).is(":checked")) {
                    $(".phone").removeAttr('disabled');
                } else {
                    $(".phone").attr('disabled', '1');
                }

            });

            $("#changeBank").change(function () { 
                if ($(this).is(":checked")) {
                    $(".bank").removeAttr('disabled');
                } else {
                    $(".bank").attr('disabled', '1');
                }

            });
        });
    </script>
@endsection