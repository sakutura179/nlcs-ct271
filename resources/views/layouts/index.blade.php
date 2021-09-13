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
    <script>
        const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
        const currentTheme = localStorage.getItem('theme');
    
        if (currentTheme) {
            /*  
                Kiem tra bien toan cuc theme xem co duoc set chua. 
                Neu da duoc set thi gan theme o trang truoc vao trang hien tai
            */
            document.documentElement.setAttribute('data-theme', currentTheme);
    
            if (currentTheme === 'dark') {
                /*  
                    Neu theme duoc set la dark thi checked check box
                */
                toggleSwitch.checked = true;
            }
        }
    
        function switchTheme(e) {
            if (e.target.checked) {
                // Set thuoc tinh data-theme cho html thanh dark
                document.documentElement.setAttribute('data-theme', 'dark');
                // Gan bien theme la dark
                localStorage.setItem('theme', 'dark');
            } else {
                // Set thuoc tinh data-theme cho html thanh light
                document.documentElement.setAttribute('data-theme', 'light');
                // Gan bien theme la light
                localStorage.setItem('theme', 'light');
            }
        }
    
        toggleSwitch.addEventListener('change', switchTheme, false);
    </script>
</body>
</html>