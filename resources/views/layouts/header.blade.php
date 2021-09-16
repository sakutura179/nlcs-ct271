<div class="menu">
    <div class="logo">
        <a href="{{ route('mainPage') }}"><img src="{{ asset('img/GE-logo.png') }}" alt=""></a>
    </div>
    <div class="list" id="lol">
        <a href="{{ route('category', ['slug' => 'lmht']) }}">LMHT</a>
    </div>
    <div class="list" id="tft">
        <a href="{{ route('category', ['slug' => 'dtcl']) }}">ĐTCL</a>
    </div>
    <div class="list" id="val">
        <a href="{{ route('category', ['slug' => 'valorant']) }}">VALORANT</a>
    </div>
    <div class="list" id="csgo">
        <a href="{{ route('category', ['slug' => 'cs-go']) }}">CS:GO</a>
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
    <div class="list">
        <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox" />
                <div class="slider round"></div>
            </label>
        </div>
    </div>
    <div class="list dropdown">
        <a>NHIỀU HƠN <i class="fa fa-caret-down" aria-hidden="true"></i></i></a>
        <div class="dropdown-content">
            <a href="{{ route('category', ['slug' => 'toc-chien']) }}">TỐC CHIẾN</a>
            <a href="{{ route('category', ['slug' => 'lqm']) }}">LIÊN QUÂN MOBILE</a>
            <a href="{{ route('category', ['slug' => 'dota-2']) }}">DOTA 2</a>
            <a href="{{ route('category', ['slug' => 'tin-cong-nghe']) }}">TIN CÔNG NGHỆ</a>
            <a href="{{ route('category', ['slug' => 'khac']) }}">KHÁC</a>
            @if (isset($viewer_login) || isset($author_login) || isset($admin_login))
                <a href="{{ route('logout') }}">ĐĂNG XUẤT</a>
            @else
                <a href="{{ route('signin') }}">ĐĂNG KÝ</a>
            @endif
        </div>
    </div>
</div>  
