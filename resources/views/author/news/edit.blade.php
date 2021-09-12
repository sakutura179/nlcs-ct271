@extends('author.layout.authorMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    {{-- summernote --}}
    <link href="{{ asset('summernote/summernote.min.css') }}" rel="stylesheet">  
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
    {{-- summernote --}}
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('summernote/lang/summernote-vi-VN.js') }}"></script>
@endsection

@section('title')
    <title>Chỉnh Sửa Bài Viết</title>
@endsection

@section('content')
    @include('author.news.menu')
        
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
            <form action="{{ route('author-post-edit-news') }}" method="post" 
                  onsubmit="return news()" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="div-input">
                    <label for="category_id" class="myLabel">Thể loại</label>
                    <select name="category_id" id="category_id" required
                            class="selectpicker show-tick" data-width="100%" data-size="5"
                            data-actions-box="true" data-dropup-auto="false"
                            data-live-search="true">
                        @foreach ($listCategory as $item)
                            <option value="{{ $item->category_id }}"
                            @if ($item->category_id == $data->category_id)
                                {{ "selected" }}
                            @endif>{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                    <p id="invalid-category" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="header" class="myLabel">Tiêu đề</label>
                    <input type="text" name="header" id="header" class="input" maxlength="128"
                            style="width: 100%" value="{{ $data->header }}">
                    <p id="invalid-header" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="content" class="myLabel">Nội dung</label>
                    <textarea name="content" id="content">{{ $data->content }}</textarea>
                    <p id="invalid-content" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="pic" class="myLabel">Hình ảnh tiêu đề (Bỏ qua nếu không thay đổi ảnh tiêu đề)</label>
                    <input type="file" style="width: 100%" name="pic" id="pic" 
                            accept="image/*, video/mp4, video/ts">
                    <p id="invalid-pic" class="error">ok</p>
                </div>
                <input type="hidden" name="username" value="{{ $author_login->username }}">
                <input type="hidden" name="news_id" value="{{ $data->news_id }}">
                <div class="div-btn">
                    <input type="reset" value="Nhập lại" class="input-button">
                    <input type="submit" value="Chỉnh sửa" class="input-button">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script>
        
        let name = document.getElementById('news');
        name.className = 'list active';

        let xMenu = document.getElementById('edit');
        xMenu.className = 'content-list active'; 

        $(document).ready(function() {
            $('#content').summernote({
                height: 1000,
                lang: "vi-VN",
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'undo', 'redo', 'help']],
                ],
            });
        });
    </script>
@endsection