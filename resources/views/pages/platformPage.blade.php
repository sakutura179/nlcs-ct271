@extends('layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/cate-platPage.css') }}">
    {{-- dark mode --}}
    <link rel="stylesheet" href="{{ asset('css/front/mainPage.css') }}">
@endsection

@section('title')
    <title>Nền Tảng: {{ $platform->platform_name }}</title>
@endsection

@section('content')
    <div class="content">

        <!-- Cac bai bao -->
        <div class="main">
            <div class="post-container">
                <div class="content-header">Nền Tảng: {{ $platform->platform_name }}</div>
                <div class="posts">
                    @if (count($news) > 0) <!-- Neu bien news co bai viet thi in ra man hinh -->
                        @foreach ($news as $item)
                            <div class="post">
                                <a href="{{ route('post', ['id' => $item->news_id]) }}" target="_blank">
                                    <img src="{{ asset($item->pic) }}" alt="$item->header"></a>
                                <div class="news-frame"></div>
                                <p><a href="{{ route('category', ['id' => $item->category_id]) }}" id="category">
                                    {{ $item->newsBelongsToCategory->category_name }}</a>
                                <a href="{{ route('post', ['id' => $item->news_id]) }}" target="_blank">{{ $item->header }}
                                <br><i>Lượt xem: {{ $item->view }}<br>{{ $item->created_at }}</i></a>
                                </p>
                            </div>
                        @endforeach
                        <div class="paginate">{!! $news->links() !!}</div>
                    @else <!-- Neu khong co thi in ra KHONG CO BAI VIET -->
                        <p class="none">KHÔNG CÓ BÀI VIẾT</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection