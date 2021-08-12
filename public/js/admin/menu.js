// Chuyển đổi H menu trong trang
let contentList = document.querySelectorAll('.content-list');
for (let i = 0; i < contentList.length; i++) {
    contentList[i].onclick = function() {
        let j = 0;
        while (j < contentList.length) {
            contentList[j++].className = 'content-list';
        }
        contentList[i].className = 'content-list active';
    }
}

// V - menu toggle
let menuToggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let content = document.querySelector('.content');
menuToggle.onclick = function() {
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
    content.classList.toggle('active');
}

// Chuyển đổi V menu trong trang
let list = document.querySelectorAll('.list');
for (let i = 0; i < list.length; i++) {
    list[i].onclick = function() {
        let j = 0;
        while (j < list.length) {
            list[j++].className = 'list';
        }
        list[i].className = 'list active';
    }
}