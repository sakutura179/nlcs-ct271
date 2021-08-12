@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title')
    <title>Danh Sách Người Dùng</title>
@endsection

@section('content')
    @include('admin.viewer.menu')
            
    <div class="container">
        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif
        <table id="table">
            <thead>
                <tr>
                    <th>Tên Tài Khoản</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Ngày Sinh</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->birth_day }}</td>
                        <td class="icon"><a href="{{ route('delete-viewer', ['id' => $item->username]) }}"
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
        let name = document.getElementById('viewer');
        name.className = 'list active';

        let xMenu = document.getElementById('list');
        xMenu.className = 'content-list active'; 
    </script>
@endsection