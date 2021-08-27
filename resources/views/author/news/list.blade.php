@extends('author.layout.authorMaster')

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
    @include('author.news.menu')
    
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
                    <th>Sửa</th>
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
                            @if ($item->trending == 0)
                                {{ "Không" }}
                            @else
                                {{ "Có" }}
                            @endif
                        </td>
                        <td>{{ $item->view }}</td>
                        <td style="text-align: center;">
                            <a target="_blank" href="{{ route('post', ['id'=>$item->news_id]) }}">Xem</a>
                        </td>
                        <td class="icon"><a href="{{ route('author-list-comment', ['id' => $item->news_id]) }}">
                            <ion-icon name="clipboard-outline"></ion-icon></a></td>
                        <td class="icon"><a href="{{ route('author-edit-news', ['id' => $item->news_id]) }}">
                            <ion-icon name="create-outline"></ion-icon></a></td>
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
    </script>
@endsection