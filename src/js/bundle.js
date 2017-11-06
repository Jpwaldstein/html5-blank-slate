// The JS pipleine uses a combination of browserify and babel, allowing you to  
// either `import` or `require` CommonJS and/or ES6 modules alongside simple
// browser targeted JS.
//
// This includes local modules you've written/downloaded, or any modules in the 
// npm ecosystem, meaning you could install any module via yarn/npm and then use 
// it in bundle code with no other configuration.
//
// For example at the command line:
//
//     yarn add underscore
//
// Then in any JS file you've required in the bundle:
//
//     import _ from 'underscore';
//
// OR equivalently:
//
//     var _ = require('underscore');

import './global';
import $ from 'jquery';
import slick from 'slick-carousel-browserify';

$('.slick-slider__logos').slick({
    arrows: true,
    slidesToScroll: 1,
    slidesToShow: 6,
    prevArrow: '<i class="fa fa-angle-left slick-left color-black-fade" aria-hidden="true"></i>',
    nextArrow: '<i class="fa fa-angle-right slick-right color-black-fade" aria-hidden="true"></i>',
    responsive: [
    {
        breakpoint: 1100,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 1
        }
    },
    {
        breakpoint: 640,
        settings: {
            slidesToShow: 1
        }
    }
    ]
});

$('.slick-slider__testinomials').slick({
    arrows: true,
    slidesToScroll: 1,
    slidesToShow: 1,
    prevArrow: '<i class="fa fa-angle-left slick-left color-black-fade top-25" aria-hidden="true"></i>',
    nextArrow: '<i class="fa fa-angle-right slick-right color-black-fade top-25" aria-hidden="true"></i>',
});
