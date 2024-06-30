$('.dropify').dropify({
    messages: {
        'default': 'Sélectionnez votre photo de profil',
        'replace': 'Sélectionnez votre photo de profil',
        'remove': 'Remove',
        'error': 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
    }
});

$('.dropify2').dropify({
    messages: {
        'default': 'Ajouter une vidéo et une photo de portfolio',
        'replace': 'Ajouter une vidéo et une photo de portfolio',
        'remove': 'Remove',
        'error': 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
    }
});


// Copyright © 2024 Afreel ®

const d = new Date();
let year = d.getFullYear();
document.getElementById("FooterYear").innerHTML = year;

// Slider
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

// Password
var input1 = document.querySelector('#password');
function myFunctioncheckshow() {
    if (input1.type === "password") {
        input1.type = "text"
    } else {
        input1.type = "password"


    }
}
var input2 = document.querySelector('#password_confirmation');
function myFunctioncheck() {
    if (input2.type === "password") {
        input2.type = "text"
    } else {
        input2.type = "password"


    }
}
var input3 = document.querySelector('.password_log');
function myFunctionlog() {
    if (input3.type === "password") {
        input3.type = "text"
    } else {
        input3.type = "password"


    }
}


function hiIcon() {
    document.querySelector('.fa-circle-plus').style.opacity = '0';
}
function viIcon() {
    document.querySelector('.fa-circle-plus').style.opacity = '';
}

