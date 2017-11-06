<?php

// Enqueue Styles
function h5bs_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false, '4.5.0' );
    wp_enqueue_style( 'h5bs-theme', get_template_directory_uri() . '/assets/css/theme.css', false, '3.6.0' );
    wp_enqueue_style( 'slick-carousel', get_template_directory_uri() . '/node_modules/slick-carousel-browserify/slick/slick-theme.css', false, '3.6.0' );
    wp_enqueue_style( 'h5bs-custom', get_template_directory_uri() . '/custom.css', false, '3.6.0' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900', false, '3.6.0' );
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_styles' );


// Enqueue Scripts
function h5bs_enqueue_scripts() {
    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendor.bundle.js', array('jquery'), '3.6.0', true);
    // wp_enqueue_script('commons-js', get_template_directory_uri() . '/assets/js/commons.bundle.js', array(), '3.6.0', true);
    wp_enqueue_script('bundle-js', get_template_directory_uri()  . '/assets/js/bundle.js', array('jquery'), '3.6.0', true);
}

add_action( 'wp_enqueue_scripts', 'h5bs_enqueue_scripts' );
