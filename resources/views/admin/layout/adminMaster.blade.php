<!-- 
    Su dung:
        DataTable cua jQuery
-->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.meta')
    @include('css')
    @include('admin.layout.adminCss')
    @yield('css')
    @yield('upperScript')
    @yield('title')
</head>
<body>
    @include('admin.layout.menu')

    <div class="content">
        @yield('content')
    </div>
    
    @include('script')
    @include('admin.layout.adminScript')
    @yield('lowerScript')
</body>
</html>