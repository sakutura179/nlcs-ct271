@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title')
    <title>Danh Sách Thể Loại</title>
@endsection

@section('content')
    @include('admin.category.menu')

    <div class="container">
        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif
        <table id="table">
            <thead>
                <tr>
                    <th>ID Thể Loại</th>
                    <th>Tên Thể Loại</th>
                    <th>Tên Đầy Đủ</th>
                    <th>Nền Tảng</th>
                    <th>Chỉnh Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->category_id }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td>{{ $item->category_fullname }}</td>
                        <td>
                            @php
                                //Chon ra id nen tang cua the loai
                                $data = \App\Cate_plat::where(['category_id' => $item->category_id])
                                                ->pluck('platform_id')
                                                ->all();
                                $plats_name = "";
                                foreach ($data as $value) {
                                    //Moi id nen tang tim ten nen tang
                                    $plat_name = \App\Platform::where(['platform_id' => $value])
                                                                ->pluck('platform_name')
                                                                ->first();
                                    $plats_name .= $plat_name.", "; //noi vao chuoi
                                } 
                                $string = rtrim($plats_name, ', '); //xoa dau , cuoi
                                echo $string;
                            @endphp
                        </td>
                        <td class="icon"><a href="{{ route('edit-category', ['id' => $item->category_id]) }}">
                            <ion-icon name="create-outline"></ion-icon></a></td>
                        <td class="icon"><a href="{{ route('delete-category', ['id' => $item->category_id]) }}"
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
        let name = document.getElementById('category');
        name.className = 'list active';

        let xMenu = document.getElementById('list');
        xMenu.className = 'content-list active';
    </script>
@endsection