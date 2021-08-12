<div class="content-navigation">
    <span class="content-list" id="list">
        <a href="{{ route('author-news-list', ['id' => $author_login->username] ) }}">Danh Sách Bài Viết Của Bạn</a>
    </span >
    <span class="content-list" id="add">
        <a href="{{ route('author-add-news') }}">Tạo Bài Viết Mới</a>
    </span >
    <span class="content-list" id="edit">
        <a href="">Sửa Bài Viết</a>
    </span >
    <span class="content-list" id="comment">
        <a href="">Quản Lý Bình Luận</a>
    </span >
</div>