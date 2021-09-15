@extends('layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/cate-platPage.css') }}">
    {{-- dark mode --}}
    <link rel="stylesheet" href="{{ asset('css/front/mainPage.css') }}">
@endsection

@section('title')
    <?php 
        if (isset($category)) {
            $category_fullname = $category->category_fullname;
            $category_id = $category->category_id;
        } else {
            $category_fullname = 'Khác';
            $category_id = '0';
        }
    ?>
    <title>Thể Loại: {{ $category_fullname }}</title>
@endsection

@section('content')
    <div class="content">

        <!-- Cac bai bao -->
        <div class="main">
            <div class="post-container">
                <div class="content-header">Thể Loại: {{ $category_fullname }}</div>
                <div class="posts">
                    @if (count($news) > 0)
                        @foreach ($news as $item)
                            <div class="post">
                                <a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">
                                    <img src="{{ asset($item->pic) }}" alt="$item->header"></a>
                                <div class="news-frame"></div>
                                <p><a href="{{ route('category', ['id' => $item->category_id]) }}" id="category">
                                    {{ $item->newsBelongsToCategory->category_name }}</a>
                                <a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">{{ $item->header }}
                                <br><i>Lượt xem: {{ $item->view }}<br>{{ $item->created_at }}</i></a>
                                </p>
                            </div>
                        @endforeach
                        <div class="paginate">{!! $news->links() !!}</div>
                    @else
                        <p class="none">KHÔNG CÓ BÀI VIẾT</p>
                    @endif                    
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" id="id" value="{{ $category_id }}"> <!-- Dung de danh dau thanh header -->
@endsection

@section('lowerScript')
    <script>
        switch (document.querySelector('#id').value) {
            case "1":
                document.getElementById('lol').className = 'list active';
                // alert("1");
                break;
            case "13":
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
    </script>
@endsection