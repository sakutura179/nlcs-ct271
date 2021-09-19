@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Thêm Tác Giả</title>
@endsection

@section('content')
    @include('admin.author.menu')
        
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif
        <div class="form">
            <form action="{{ route('post-add-author') }}" method="post" onsubmit="return author()">
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
                           value="{{ old('email') }}"maxlength="100">
                    <p id="invalid-email" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="birth_day" class="myLabel">Ngày sinh</label>
                    <input type="date" name="birth_day" id="birth_day" class="input" value="{{ old('birth_day') }}">
                    <p id="invalid-bday" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="address" class="myLabel">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="input"
                           value="{{ old('address') }}" maxlength="100">
                    <p id="invalid-address" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="phone_no" class="myLabel">Số điện thoại</label>
                    <input type="tel" placeholder="012-345-6789" pattern="[0]{1}[0-9]{9}" 
                     name="phone_no" id="phone_no" class="input" maxlength="10" value="{{ old('phone_no') }}">
                    <p id="invalid-phone" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="posts" class="myLabel">Số bài viết đã đăng</label>
                    <input type="number" name="posts" id="posts" class="input" value="{{ old('posts') }}">
                    <p id="invalid-posts" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="level" class="myLabel">Cấp độ tài khoản</label>
                    <input type="number" name="level" id="level" class="input" value="{{ old('level') }}">
                    <p id="invalid-level" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="b_account_no" class="myLabel">Số tài khoản ngân hàng</label>
                    <input type="tel" pattern="[0-9]{14}" name="b_account_no" value="{{ old('b_account_no') }}"
                     id="b_account_no" class="input" maxlength="14">
                    <p id="invalid-bank" class="error">ok</p>
                </div>
                <div class="div-btn">
                    <input type="reset" value="Nhập lại" class="input-button">
                    <input type="submit" value="Thêm" class="input-button">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script>
        let name = document.getElementById('author');
        name.className = 'list active';

        let xMenu = document.getElementById('add');
        xMenu.className = 'content-list active'; 
    </script>
@endsection