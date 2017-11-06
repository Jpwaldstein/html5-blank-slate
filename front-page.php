<?php get_header(); ?>

<?php get_template_part('parts/home-page-header'); ?>

<div class="content-wrap page-content" role="main">


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article <?php post_class( 'group' ); ?> role="article">
        <?php the_content(); ?>
    </article>

    <?php endwhile; endif; ?>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>