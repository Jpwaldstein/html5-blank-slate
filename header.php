<?php
/**
 * Default Header Template
 *
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php // Place favicon.ico and apple-touch-icon.png in the root of the domain ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="site-header" class="header" role="banner">
    <div class="header-content row">
        <div class="header-content__left flex-1">
        </div>
        <div class="header-content__middle flex-1 text-center">
            <span class="logo">
                <a href="<?php echo home_url( '/' ); ?>">
                    <img src="<?= get_template_directory_uri()?>/assets/images/logo.png" alt="">
                </a>
            </span>
        </div>
        <div class="header-content__right flex-1">
            <nav class="nav-mobile-wrap" role="navigation">
                <i id="nav-mobile-toggle" class="nav-mobile-toggle fa fa-bars"></i>
                <?php h5bs_mobile_nav(); ?>
            </nav>
        </div>
    </div>
</header>
