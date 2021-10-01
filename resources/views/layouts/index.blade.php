<!-- 
    Su dung:
        DataTable cua jQuery
        ckeditor - trinh soan thao Rich Text
        bootstrap-select - select option menu
        bootstrap 3.4.1
        jQuery
-->
<!-- Trang nay duoc su dung de lam trang goc cua trang chu (giao dien nguoi dung) -->
<!-- Toan bo file trong thu muc layouts duoc su dung de lam "khung" cho thu muc pages -->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.meta')
    @include('css')
    <link rel="stylesheet" href="{{ asset('css/front/pages.css') }}">
    @include('script')
    @yield('css')
    @yield('upperScript')
    @yield('title')
</head>
<body>
    @include('layouts.header')
    
    @yield('content')

    @include('layouts.footer')
    @yield('lowerScript')
    <!-- Script chuyen doi theme -->
    <script src="{{ asset('js/switchTheme.js') }}"></script>
</body>
</html>