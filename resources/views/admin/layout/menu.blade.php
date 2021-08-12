<div class="navigation">
    <ul>
        <li class="list" id="home">
            <b></b>
            <b></b>
            <a href="{{ route('admin-home', ['id' => $admin_login->username]) }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">Trang Chủ</span>
            </a>
        </li>
        <li class="list" id="platform">
            <b></b>
            <b></b>
            <a href="{{ route('platform-list') }}">
                <span class="icon">
                    <ion-icon name="cube-outline"></ion-icon>
                </span>
                <span class="title">Nền Tảng</span>
            </a>
        </li>
        <li class="list" id="category">
            <b></b>
            <b></b>
            <a href="{{ route('category-list') }}">
                <span class="icon">
                    <ion-icon name="book-outline"></ion-icon>
                </span>
                <span class="title">Thể Loại</span>
            </a>
        </li>
        <li class="list" id="news">
            <b></b>
            <b></b>
            <a href="{{ route('news-list') }}">
                <span class="icon">
                    <ion-icon name="newspaper-outline"></ion-icon>
                </span>
                <span class="title">Bài Viết</span>
            </a>
        </li>
        <li class="list" id="author">
            <b></b>
            <b></b>
            <a href="{{ route('author-list') }}">
                <span class="icon">
                    <ion-icon name="brush-outline"></ion-icon>
                </span>
                <span class="title">Tác Giả</span>
            </a>
        </li>
        <li class="list" id="viewer">
            <b></b>
            <b></b>
            <a href="{{ route('viewer-list') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">Người Dùng</span>
            </a>
        </li>
        <li class="logout">
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