@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title')
    <title>Danh Sách Nền Tảng</title>
@endsection

@section('content')
    @include('admin.platform.menu')

    <div class="container">
        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif
        <table id="table">
            <thead>
                <tr>
                    <th>ID Nền Tảng</th>
                    <th>Tên Nền Tảng</th>
                    <th>Chỉnh Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->platform_id }}</td>
                        <td>{{ $item->platform_name }}</td>
                        <td class="icon"><a href="{{ route('edit-platform', ['id' => $item->platform_id]) }}">
                            <ion-icon name="create-outline"></ion-icon></a></td>
                        <td class="icon"><a href="{{ route('delete-platform', ['id' => $item->platform_id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <ion-icon name="trash-outline"></ion-icon></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('lowerScript')
    <script>
        let name = document.getElementById('platform');
        name.className = 'list active';

        let xMenu = document.getElementById('list');
        xMenu.className = 'content-list active';
    </script>
@endsection