@extends('layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/news.css') }}">
    {{-- dark mode --}}
    <link rel="stylesheet" href="{{ asset('css/front/mainPage.css') }}">
    <?php $csrf = csrf_token() ?>
@endsection

@section('title')
    <title>{{ $data->header }}</title>
@endsection

@section('content')
    <div class="content">
            <!-- NOI DUNG TIN TUC -->
            <p class='header'>{{ $data->header }}</p>
            <p>Viết bởi: {{ $data->newsBelongsToAuthor->fullname }} | {{ $data->created_at }} 
                    | Thể loại: {{ $data->newsBelongsToCategory->category_name }}
                    | Lượt xem: {{ $data->view }}</p>
            <div class='news-content'>{!! $data->content !!}</div>

            <!-- TIN LIEN QUAN -->
            <h2 style="text-align: center; margin-bottom: 0px">Tin liên quan</h2>
            <div class="related-news-container" id="related">
                <?php $i = 0; ?> <!-- Tao bien dem -->
                @foreach ($related as $item)
                    @if ($i == 4) @break @endif <!-- Neu da in ra 4 bai thi dung -->
                    @if ($item->news_id == $data->news_id) @continue @endif <!-- Neu bai dang duyet trung voi bai hien tai thi bo qua -->
                    <div class="related-news">
                        <a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">
                            <img src="{{ asset($item->pic) }}" alt="$item->header"></a>
                        <p><a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">
                            {{ $item->header }}</a></p>
                        <div class="news-frame"></div>
                    </div>
                    <?php $i++; ?> <!-- Tang bien dem len (Tuc la da duyet duoc i++ bai) -->
                @endforeach
            </div>

            <!-- BINH LUAN -->
            <div class="comments">
                <h2>Bình luận</h2>
                @if (isset($viewer_login))
                    
                    <div class="write-comment-container">
                        <p>Xin chào <b>{{ $viewer_login->fullname }}</b></p>
                        <p>Viết bình luận ... <i class="fa fa-pencil" aria-hidden="true"></i></p>
                        <form action="{{ route('viewer-comment') }}" method="POST" id="comment-form">
                            {{ csrf_field() }}
                            <textarea name="comment" id="comment"></textarea>
                            <input type="hidden" name="viewer_id" value="{{ $viewer_login->username }}">
                            <input type="hidden" name="news_id" value="{{ $data->news_id }}">
                            <input type="submit" value="Bình luận" id="comment-btn">
                        </form>
                        <script>
                            $(function() {
                                $('#comment-form').submit(function (e) { // Khi submit form thì function này sẽ chạy
                                    e.preventDefault();
                                    
                                    var actionURL = e.currentTarget.action; // Lấy ra đường dẫn của action

                                    $.ajax({
                                        url: actionURL,
                                        type: 'post', // Kiểu truyền
                                        data: $('#comment-form').serialize(), // Dữ liệu (Truy cập bằng biến post)
                                        success: function(data) { // Nếu xử lý thành công thì ...
                                            $('#comments-container').html(data);
                                        }
                                    })
                                });
                            });
                        </script>
                    </div>
                @else
                    <div class="write-comment-container">
                        <p> <a href="{{ route('login') }}" style="color: blue;">Đăng nhập</a> để viết bình luận</p>
                    </div>
                @endif
                <div id="comments-container">
                    @foreach ($comments as $comment)
                        <div class="comment" id="{{ $comment->comment_id }}">
                            <p class="comment-header">{{ $comment->commentBelongsToViewer->fullname }}
                                <small> {{ $comment->created_at }}</small></p>
                            <p class="comment-content">{{ $comment->content }}</p>
                            @if (isset($viewer_login))
                                @if ($comment->username == $viewer_login->username)
                                    <p><a onclick="editComment({{ $comment->comment_id }})" 
                                            style="color: blue; cursor: pointer;"> 
                                            Sửa bình luận <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                       <a onclick="deleteComment({{ $comment->comment_id }})"  
                                            style="color: blue; cursor: pointer;"> 
                                            Xóa bình luận <i class="fa fa-trash" aria-hidden="true"></i> </a></p>
                                @endif
                            @endif
                            @if (isset($admin_login))
                                <p><a onclick="deleteComment({{ $comment->comment_id }})"  
                                        style="color: blue; cursor: pointer;"> 
                                        Xóa bình luận <i class="fa fa-trash" aria-hidden="true"></i> </a></p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
    <!-- Dung de gui du lieu xuong duoi script -->
    <input type="hidden" name="id" id="id" value="{{ $data->newsBelongsToCategory->category_id }}"> 
@endsection

@section('lowerScript')
    <script>
        // Code dung de danh dau thanh header
        switch (document.querySelector('#id').value) {
            case "1":
                document.getElementById('lol').className = 'list active';
                // alert("1");
                break;
            case "8":
                document.getElementById('tft').className = 'list active';
                break;
            case "2":
                document.getElementById('val').className = 'list active';
                break;
            case "3":
                document.getElementById('csgo').className = 'list active';
                break;
            default:
                break;
        }
        // Code dung de tu dong chinh do cao cua khung Tin Lien Quan
        var i = '<?php echo $i ?>';
        if (i > 2) {
            document.getElementById('related').style.height = "350px";
        } else {
            if (i > 0) {
                document.getElementById('related').style.height = "200px";
            } else {
                document.getElementById('related').style.height = "20px";
            }
        }

        function editComment(id) { // Ham AJAX de xu ly sua comment
            csrf = '<?php echo $csrf; ?>';
            $.get("/viewer/edit-comment/" + id + "/" + csrf, function (data) { // Goi ra ham getSua (Hien thi truc tiep textarea)
                    $('#'+id).html(data);
                }
            );
        }

        function deleteComment(id) { // Ham AJAX de xu ly xoa comment
            if (confirm('Bạn có muốn xóa?')) {
                $.get("/viewer/delete-comment/" + id, function (data) {
                        $('#comments-container').html(data);
                    }
                );
            }
        }
    </script>
@endsection