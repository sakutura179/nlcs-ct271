var slideIndex = 1;
showSlidesAuto();
activeTimer();

function currentSlide(n) {
    slideIndex = parseInt(n);
    showSlides(slideIndex);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName('slides');
    var dots = document.getElementsByClassName('dot');

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    for (i = 0; i < dots.length; i++) {

        dots[i].className = 'dot';
    }

    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className = 'dot active';
}

// automatic slideshow
function pauseTimer() {
    clearInterval(auto);
}

function activeTimer() {
    auto = setInterval('showSlidesAuto()', 5000);
}

function showSlidesAuto() {
    var i;
    var slides = document.getElementsByClassName('slides');
    var dots = document.getElementsByClassName('dot');

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    for (i = 0; i < dots.length; i++) {

        dots[i].className = 'dot';
    }

    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className = 'dot active';
    slideIndex++;
}