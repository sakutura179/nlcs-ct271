@extends('author.layout.authorMaster')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('content')
    <h1>Đăng nhập thành công</h1>
    @if (isset($author_login->username))
        {{"Tên đăng nhập: " . $author_login->username}}</br>
        {{"Loại tài khoản: " . $author_login->authorBelongsToRole->role_name}}</br>
        {{"Tên tác giả: " . $author_login->fullname}}</br>
        {{"Email: " . $author_login->email}}</br>
        {{"Ngày sinh: " . $author_login->birth_day}}</br>
        {{"Địa chỉ: " . $author_login->address}}</br>
        {{"Số điện thoại: " . $author_login->phone_no}}</br>
        {{"Cấp độ: " . $author_login->level}}</br>
        {{"Lương: " . $author_login->salary}}</br>
        {{"Số tài khoản ngân hàng: " . $author_login->b_account_no}}</br>
        <a href="{{ route('edit-author', ['id' => $author_login->username]) }}">Chỉnh sửa thông tin cá nhân</a>
    @endif
    <br>
@endsection

@section('lowerScript')
    <script>
        let name = document.getElementById('home');
        name.className = 'list active';
    </script>
@endsection