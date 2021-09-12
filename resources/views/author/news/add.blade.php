@extends('author.layout.authorMaster')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/h-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('upperScript')
    <script src="{{ asset('js/admin/regEx.js') }}"></script>
    {{-- ckeditor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('title')
    <title>Tạo Bài Viết Mới</title>
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
            <form action="{{ route('author-post-add-news') }}" method="post" 
                  onsubmit="return news()" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="div-input">
                    <label for="category_id" class="myLabel">Thể loại</label>
                    <select name="category_id" id="category_id" required
                            class="selectpicker show-tick" data-width="100%" data-size="5"
                            data-actions-box="true" data-dropup-auto="false"
                            data-live-search="true">
                        @foreach ($listCategory as $item)
                            <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                    <p id="invalid-category" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="header" class="myLabel">Tiêu đề</label>
                    <input type="text" name="header" id="header" class="input" maxlength="128" style="width: 100%">
                    <p id="invalid-header" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="content" class="myLabel">Nội dung</label>
                    <textarea name="content" id="content"></textarea>
                    <p id="invalid-content" class="error">ok</p>
                </div>
                <div class="div-input">
                    <label for="pic" class="myLabel">Hình ảnh tiêu đề</label>
                    <input type="file" style="width: 100%" name="pic" id="pic" 
                            accept="image/*, video/mp4, video/ts" required>
                    <p id="invalid-pic" class="error">ok</p>
                </div>
                <input type="hidden" name="username" value="{{ $author_login->username }}">
                <div class="div-btn">
                    <input type="reset" value="Nhập lại" class="input-button">
                    <input type="submit" value="Thêm" class="input-button">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script>
        
        let name = document.getElementById('news');
        name.className = 'list active';

        let xMenu = document.getElementById('add');
        xMenu.className = 'content-list active'; 

        CKEDITOR.replace( 'content' );
    </script>
@endsection