<?php  /* Template Name: Faqs */  ?>

<?php get_header(); ?>


<?php get_template_part('parts/page-header'); ?>

<div class="content-wrap page-content row" role="main">
	<div class="row flex-center p-top-50px">
	  <div class="column small-12 medium-10 margin-auto">
		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <article <?php post_class( 'group' ); ?> role="article">
		        <?php the_content(); ?>
		    </article>
		</div>
	</div>

    <?php endwhile; endif; ?>

</div><!-- end content -->

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
