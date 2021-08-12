@extends('author.layout.authorMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title')
    <title>Quản Lý Bình Luận</title>
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
                    <th>ID Bình Luận</th>
                    <th>Tài Khoản Bình Luận</th>
                    <th>Tên Người Bình Luận</th>
                    <th>Nội Dung</th>
                    <th>Thời Gian Đăng</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->comment_id }}</td>
                        <th>{{ $item->username }}</th>
                        <td>{{ $item->commentBelongsToViewer->fullname }}</td>
                        <td>{{ $item->content }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="icon"><a href="{{ route('author-delete-comment', 
                                            ['idc' => $item->comment_id, 'id' => $item->news_id]) }}"
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

        let xMenu = document.getElementById('comment');
        xMenu.className = 'content-list active';
    </script>
@endsection