@extends('admin.layout.adminMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <style>
        img {
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 160px;
        }
    </style>
@endsection

@section('title')
    <title>Danh Sách Bài Viết</title>
@endsection

@section('content')
    @include('admin.news.menu')
    
    <div class="container">
        @if (session('noti'))
            <div class="alert alert-success">
                {{ session('noti') }}
            </div>
        @endif
        <table id="table">
            <thead>
                <tr>
                    <th>ID Bài Viết</th>
                    <th>Tên Thể Loại</th>
                    <th>Tên Tác Giả</th>
                    <th>Tựa Đề</th>
                    <th>Nổi Bật</th>
                    <th>Lượt Xem</th>
                    <th>Xem Chi Tiết</th>
                    <th>Quản Lý Comment</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->news_id }}</td>
                        <td>{{ $item->newsBelongsToCategory->category_name }}</td>
                        <td>{{ $item->newsBelongsToAuthor->fullname }}</td>
                        <td><p>{{ $item->header }}</p>
                            <img src="{{ asset($item->pic) }}">
                        </td>
                        <td>
                            <p id="{{ $item->news_id }}">
                                @if ($item->trending == 0)
                                    {{ "Không" }}
                                @else
                                    {{ "Có" }}
                                @endif
                            </p>
                            <input type="checkbox" name="trending" id="treding" value="{{ $item->news_id }}" 
                                onchange="ajax({{ $item->news_id }})"
                                @if ($item->trending == 1)
                                    {{ "checked='checked'" }}
                                @endif
                            >
                        </td>
                        <td>{{ $item->view }}</td>
                        <td style="text-align: center;">
                            <a target="_blank"  href="{{ route('post', ['slug' => $item->slug]) }}">Xem</a>
                        </td>
                        <td class="icon"><a href="{{ route('list-comment', ['id' => $item->news_id]) }}">
                            <ion-icon name="clipboard-outline"></ion-icon></a></td>
                        <td class="icon"><a href="{{ route('delete-news', ['id' => $item->news_id]) }}"
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
        let name = document.getElementById('news');
        name.className = 'list active';

        let xMenu = document.getElementById('list');
        xMenu.className = 'content-list active';

        //Ham AJAX thay doi trang thai trending cua bai viet
        function ajax(id) {
            $(document).ready(function () {
            // $('input[type=checkbox][name=trending]').change(function () { // Bỏ do sử dụng datatable thì khi lấy, 
                // var id = this.value;                                      // jQuery chỉ lấy được 10 row đầu
                // alert(id);
                $.get("edit/" + id, function (data) {
                    $("#" + id).html(data);
                });
            // });
        });            
        }
    </script>
@endsection