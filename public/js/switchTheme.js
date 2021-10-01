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