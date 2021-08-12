@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection
@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
@endsection

@section('title')
    <title>Sửa Nền Tảng</title>
@endsection

@section('content')
    @include('admin.platform.menu')

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
            <form action="{{ route('post-edit-platform') }}" method="post" onsubmit="return platform()">
                {{ csrf_field() }}
                <div class="div-input">
                    <label for="platform_name" class="myLabel">Tên nền tảng</label>
                    <input type="text" name="platform_name" id="platform_name" value="{{ $data->platform_name }}" class="input">
                    <p id="invalid-name" class="error">ok</p>
                </div>
                <input type="hidden" name="platform_id" value="{{ $data->platform_id }}">
                <div class="div-btn">
                    <input type="reset" value="Nhập lại" class="input-button">
                    <input type="submit" value="Sửa" class="input-button">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script>
        let name = document.getElementById('platform');
        name.className = 'list active';

        let xMenu = document.getElementById('edit');
        xMenu.className = 'content-list active';
    </script>
@endsection