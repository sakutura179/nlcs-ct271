<!DOCTYPE html>
<html lang="en">
<head>
    @include('author.layout.meta')
    @include('author.layout.authorCss')
    @include('css')
    @include('script')
    @yield('css')
    @yield('upperScript')
    @yield('title')
</head>
<body>
    @include('author.layout.menu')

    <div class="content">
        @yield('content')
    </div>

    @include('author.layout.authorScript')
    @yield('lowerScript')
</body>
</html>