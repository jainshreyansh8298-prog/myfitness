// resources/js/components/hero-video.js

document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.hero-carousel');
    if (carousel && typeof jQuery !== 'undefined' && jQuery.fn.slick) {
        // Read the fade setting from a data attribute to keep it clean
        const fadeEffect = carousel.dataset.fade === 'true';
        
        jQuery(carousel).slick({
            fade: fadeEffect,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1000,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            cssEase: 'linear'
        });
    }
});
