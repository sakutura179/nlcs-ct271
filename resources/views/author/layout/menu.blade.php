<div class="navigation">
    <ul>
        <li class="list" id="home">
            <b></b>
            <b></b>
            <a href="{{ route('author-home', ['id' => $author_login->username]) }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Trang Chủ</span>
            </a>
        </li>
        <li class="list" id="news">
            <b></b>
            <b></b>
            <a href="{{ route('author-news-list', ['id' => $author_login->username]) }}">
                <span class="icon">
                    <ion-icon name="newspaper-outline"></ion-icon>
                </span>
                <span class="title">Bài Viết</span>
            </a>
        </li>
        <li class="logout" style="bottom: -400px">
            <a href="{{ route('logout') }}">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="title">Đăng xuất</span>
            </a>
        </li>
    </ul>
    <div class="toggle">
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
</div>