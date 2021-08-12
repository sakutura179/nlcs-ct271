<!-- 
    Su dung:
        DataTable cua jQuery
        summernote - trinh soan thao Rich Text
        bootstrap-select - select option menu
        bootstrap 3.4.1
        jQuery
-->
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.meta')
    @include('css')
    @yield('css')
    @yield('upperScript')
    @yield('title')
</head>
<body>

    <div class="content">
        @yield('content')
    </div>
    
    @include('script')
    @yield('lowerScript')
</body>
</html>