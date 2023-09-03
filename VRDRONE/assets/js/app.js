// // Navbar Scroll
const navbar = document.querySelector('.navbar');
const navbarHeightPx = 300; // Adjust this value as needed

function addClassOnScroll() {
    navbar.classList.add('fixed-top');
}

function removeClassOnScroll() {
    navbar.classList.remove('fixed-top');
}

window.addEventListener('scroll', () => {
    if (window.scrollY > navbarHeightPx) {
        navbar.style.backgroundColor = '#192647';
        addClassOnScroll();
    } else {
        navbar.style.backgroundColor = 'transparent';
        removeClassOnScroll();
    }
});

$('.banner-slick').slick({
    lazyLoad: 'ondemand',
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true
});

$('.video-slick').slick({
    lazyLoad: 'ondemand',
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true
});
