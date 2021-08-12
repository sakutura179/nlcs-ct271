<div class="menu">
    <div class="logo">
        <a href="{{ route('mainPage') }}"><img src="{{ asset('img/vn.jpg') }}" alt=""></a>
    </div>
    <div class="list" id="lol">
        <a href="{{ route('category', ['id' => 1]) }}">LMHT</a>
    </div>
    <div class="list" id="tft">
        <a href="{{ route('category', ['id' => 13]) }}">ĐTCL</a>
    </div>
    <div class="list" id="val">
        <a href="{{ route('category', ['id' => 2]) }}">VALORANT</a>
    </div>
    <div class="list" id="csgo">
        <a href="{{ route('category', ['id' => 3]) }}">CS:GO</a>
    </div>
    <div class="list">
        @while (true)
            @if (isset($viewer_login))
                <a href="{{ route('viewer-home', ['id' => $viewer_login->username]) }}">{{ $viewer_login->username }}
                    &nbsp;<i class="fa fa-user" aria-hidden="true"></i></a>
                    @break
            @endif
            @if (isset($author_login))
                <a href="{{ route('author-home', ['id' => $author_login->username]) }}">{{ $author_login->username }}
                    &nbsp;<i class="fa fa-user" aria-hidden="true"></i></a>
                @break
            @endif
            @if (isset($admin_login))
                <a href="{{ route('admin-home', ['id' => $admin_login->username]) }}">{{ $admin_login->username }}
                    &nbsp;<i class="fa fa-user" aria-hidden="true"></i></a>
                @break
            @endif
                <a href="{{ route('login') }}">ĐĂNG NHẬP</a>
            @break
        @endwhile
    </div>
    <div class="list dropdown">
        <a>NHIỀU HƠN <i class="fa fa-caret-down" aria-hidden="true"></i></i></a>
        <div class="dropdown-content">
            <a href="{{ route('category', ['id' => 5]) }}">TỐC CHIẾN</a>
            <a href="{{ route('category', ['id' => 6]) }}">LIÊN QUÂN MOBILE</a>
            <a href="{{ route('category', ['id' => 4]) }}">DOTA 2</a>
            <a href="{{ route('category', ['id' => 12]) }}">TIN CÔNG NGHỆ</a>
            <a href="{{ route('category', ['id' => 0]) }}">KHÁC</a>
            @if (isset($viewer_login) || isset($author_login) || isset($admin_login))
                <a href="{{ route('logout') }}">ĐĂNG XUẤT</a>
            @else
                <a href="{{ route('signin') }}">ĐĂNG KÝ</a>
            @endif
        </div>
    </div>
</div>  
