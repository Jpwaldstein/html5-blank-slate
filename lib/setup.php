<?php
// Custom Menus
function h5bs_register_menus() {
    register_nav_menus(array(
        'primary'   => __( 'Primary Navigation', 'h5bs' ),
        'primary-left'   => __( 'Primary Navigation Left', 'h5bs' ),
        'primary-right'   => __( 'Primary Navigation Right', 'h5bs' ),
        'secondary' => __( 'Secondary Navigation', 'h5bs' ),
        'footer'    => __( 'Footer Navigation', 'h5bs' ),
        'mobile'    => __( 'Mobile Navigation', 'h5bs' )
    ));
}

add_action( 'init', 'h5bs_register_menus' );


function h5bs_primary_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Primary Nav',                // nav name
        'menu_id'         => 'nav-main',                   // custom id
        'menu_class'      => 'dropdown menu',         // custom class
        'theme_location'  => 'primary',                    // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_primary_nav_left() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Primary Nav Left',                // nav name
        'menu_id'         => 'nav-main-left',                   // custom id
        'menu_class'      => 'dropdown menu',         // custom class
        'theme_location'  => 'primary-left',                    // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_primary_nav_right() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Primary Nav Right',                // nav name
        'menu_id'         => 'nav-main-right',                   // custom id
        'menu_class'      => 'dropdown menu',         // custom class
        'theme_location'  => 'primary-right',                    // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_secondary_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Secondary Nav',              // nav name
        'menu_id'         => 'nav-sub',                    // custom id
        'menu_class'      => 'nav-sub nav group',          // custom class
        'theme_location'  => 'secondary',                  // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_footer_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Footer Nav',                 // nav name
        'menu_id'         => 'nav-footer',                 // custom id
        'menu_class'      => 'nav-footer nav group',       // custom class
        'theme_location'  => 'footer',                     // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_mobile_nav() {
    wp_nav_menu(array(
        'container'       => false,                        // remove nav container
        'menu'            => 'Mobile Nav',                 // nav name
        'menu_id'         => 'nav-mobile',                 // custom id
        'menu_class'      => 'nav-mobile nav group',       // custom class
        'theme_location'  => 'mobile',                     // where it's located in the theme
        'before'          => '',                           // before the menu
        'after'           => '',                           // after the menu
        'link_before'     => '',                           // before each link
        'link_after'      => '',                           // after each link
        'depth'           => 0,                            // set to 1 to disable dropdowns
        'fallback_cb'     => 'h5bs_nav_fallback'           // fallback function
    ));
}

function h5bs_nav_fallback() {
    wp_page_menu(array(
        'menu_class'  => 'nav group',
        'include'     => '',
        'exclude'     => '',
        'link_before' => '',
        'link_after'  => '',
        'show_home'   => true
    ));
}

// Sidebars & Widgetizes Areas
function h5bs_register_sidebars() {
    register_sidebar(array(
        'id'            => 'sidebar1',
        'name'          => 'Sidebar 1',
        'description'   => 'The first (primary) sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
    ));
    register_sidebar(array(
        'id'            => 'footer-widget-1',
        'name'          => 'Footer Column 1',
        'description'   => 'Footer Column 1.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
    ));
    register_sidebar(array(
        'id'            => 'footer-widget-2',
        'name'          => 'Footer Column 2',
        'description'   => 'Footer Column 2.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
    ));
    register_sidebar(array(
        'id'            => 'footer-widget-3',
        'name'          => 'Footer Column 3',
        'description'   => 'Footer Column 3.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
    ));
    register_sidebar(array(
        'id'            => 'footer-widget-4',
        'name'          => 'Footer Column 4',
        'description'   => 'Footer Column 4.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
    ));
    register_sidebar(array(
        'id'            => 'footer-copyright',
        'name'          => 'Footer Copyright',
        'description'   => 'Footer Copyright.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
    ));
}

add_action( 'widgets_init', 'h5bs_register_sidebars' );


// Image Thumbnails
add_theme_support( 'post-thumbnails' );

// html5 search form
add_theme_support( 'html5', array( 'search-form' ) );