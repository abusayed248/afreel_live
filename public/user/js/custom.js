$('.dropify').dropify({
    messages: {
        'default': 'Select Your Profile Picture',
        'replace': 'Select Your Profile Picture',
        'remove': 'Remove',
        'error': 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
    }
});


// Copyright © 2024 Afreel ®

const d = new Date();
let year = d.getFullYear();
document.getElementById("FooterYear").innerHTML = year;




$(document).ready(function () {

    $('.slider-banar').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: $('.custom-prev-arrow'), // Custom previous arrow element
        nextArrow: $('.custom-next-arrow'), // Custom next arrow element
    });
});


$(document).ready(function () {

    $('.center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: $('.custom-prev-arrow'), // Custom previous arrow element
        nextArrow: $('.custom-next-arrow'), // Custom next arrow element
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
});


