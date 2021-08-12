<!-- 
    Su dung:
        DataTable cua jQuery
-->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.meta')
    @include('admin.layout.adminCss')
    @include('css')
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