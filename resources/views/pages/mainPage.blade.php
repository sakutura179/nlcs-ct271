<!-- Toan bo file trong thu muc pages dung de hien thi len cho nguoi xem -->
@extends('layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/mainPage.css') }}">
    <?php
        $bg = array('bg01.jpeg', 'bg02.jpg', 'bg03.jpg', 'bg04.jpg', 'bg05.jpg', 'bg06.jpg', 'bg07.jpg', 'bg08.jpg',
                    'bg09.jpg', 'bg10.jpg', 'bg11.jpg', 'bg12.jpg', 'bg13.jpg', 'bg14.jpg', 'bg15.jpg', 'bg16.jpg',  );
        //Hinh anh background ngau nhien
    ?>
@endsection

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('content')
    <div class="content">
        <!-- slide show -->
        <div class="slide-frame"> <!-- div de chua slide va khung (để dễ sử dụng css) -->
            <div class="slidesContainer">
                @foreach ($trending as $item)
                    <div class="slides faded">
                        <a href="{{ route('post', ['slug' => $item->slug]) }}"  
                         onmouseover='pauseTimer()' onmouseout='activeTimer()' target="_blank">
                            <img src="{{ asset($item->pic) }}" class="imgInSlides">
                        </a>
                        <div class="text">{{ $item->header }}</div>
                    </div>
                @endforeach
            </div>
            <div class="frame"></div>
              <!-- The dots/circles -->
            <div style="text-align:center">
                @php
                    $i = 1;
                    foreach ($trending as $item) {
                        echo "<span class='dot' onclick='currentSlide(".$i++.")'></span>";
                    }
                @endphp
            </div>
        </div>

        <!-- Tin moi -->
        <div class="newest-container" style="background: url({{ asset('img/bg02.jpg') }});">
            @foreach ($newest as $item)
                <div class="newest">
                    <a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">
                        <img src="{{ asset($item->pic) }}" alt="$item->header"></a>
                    <p><a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">
                        {{ $item->header }}</a>
                    <br><a href="{{ route('category', ['slug' => $item->newsBelongsToCategory->slug]) }}" id="category">
                        {{ $item->newsBelongsToCategory->category_name }}</a></p>
                    <div class="news-frame"></div>
                </div>
            @endforeach
        </div>

        <!-- Cac bai bao -->
        <div class="main">
            <div class="search">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" name="search" id="search" placeholder="Tìm Kiếm Tin Tức">
            </div>
            <div class="post-platform">
                <div class="posts">
                    @foreach ($news as $item)
                        <div class="post">
                            <a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">
                                <img src="{{ asset($item->pic) }}" alt="$item->header"></a>
                            <div class="news-frame"></div>
                            <p><a href="{{ route('category', ['slug' => $item->newsBelongsToCategory->slug]) }}" id="category">
                                {{ $item->newsBelongsToCategory->category_name }}</a>
                            <a href="{{ route('post', ['slug' => $item->slug]) }}" target="_blank">{{ $item->header }}
                            <br><i>Lượt xem: {{ $item->view }}<br>{{ $item->created_at }}</i></a>
                            </p>
                        </div>
                    @endforeach
                    <div class="more"><button id="more" onclick="more()">Xem Thêm</button><div class="btn-frame"></div></div>
                </div>
                <!-- Platform -->
                <div class="platforms">
                    @foreach ($platform as $item)
                        @php
                            $i = rand(0, count($bg)-1);
                            $selectedBg = "img/".$bg[$i];
                        @endphp
                        <div class="platform" style="background: url({{ asset($selectedBg) }});">
                            <a href="{{ route('platform', ['slug' => $item->slug]) }}">{{ $item->platform_name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('lowerScript')
    <script src="{{ asset('js/slide.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('input[type=text][name=search]').change(function () {
                var val = this.value;
                if (val === null || val === '') {
                    $.get("search/null", function (data) {
                        $('.posts').html(data);
                    },
                );
                } else {
                    $.get("search/" + val, function (data) {
                        $('.posts').html(data);
                    },
                );   
                }
            });
        });

        i=1;
        function more() {
            $(document).ready(function () {
                var val = ++i;
                $.get("more/" + val, function (data) {
                        $('.posts').html(data);
                    },
                );
            });
        }
    </script>
@endsection