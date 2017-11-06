<?php
/**
 * Add <body> classes
 */
function hopsie_body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  return $classes;
}
add_filter('body_class','hopsie_body_class');


// Add class to next/prev page links
add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );

function posts_link_attributes() {
    return 'class="button tiny radius"';
}


// Excerpts
function custom_excerpt_length( $length ) {
    return 48;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


// Remove junk from head
function h5bs_remove_junk() {
    // Really Simple Discovery
    remove_action( 'wp_head', 'rsd_link' );
    // Windows Live Writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // WP Version
    remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'h5bs_remove_junk' );


// Comments List
function h5bs_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;

    if ( get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>

        <li class="pingback" id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class( 'group' ); ?>>

                <header class="comment-meta">
                    <h5><?php _e( 'Pingback:', 'h5bs' ); ?></h5>
                    <p><?php edit_comment_link(); ?></p>
                </header>

                <p><?php comment_author_link(); ?></p>
            </article>
        <?php // WordPress closes </li>

    elseif ( get_comment_type() == 'comment' ) : ?>
        <li id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class( 'group' ); ?>>

                <header class="comment-meta">
                    <h5><?php comment_author_link(); ?></h5>
                    <p class="comment-date">on <?php comment_date(); ?> at <?php comment_time(); ?></p>

                    <p class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'h5bs' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </p>
                </header>

                <figure class="comment-avatar">
                    <?php
                    $avatar_size = 80;
                    echo get_avatar( $comment, $avatar_size );
                    ?>
                </figure>

                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'h5bs' ); ?></p>
                <?php endif; ?>

                <?php comment_text(); ?>

            </article>
        <?php // WordPress closes </li>
    endif;
}


/** https://github.com/blineberry/Improved-HTML5-WordPress-Captions **/
// Removes inline styling from wp-caption and changes to HTML5 figure/figcaption
add_filter( 'img_caption_shortcode', 'h5bs_img_caption_shortcode_filter', 10, 3 );

function h5bs_img_caption_shortcode_filter($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'      => '',
        'align'   => '',
        'width'   => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) )
        return $val;

    return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . $width . 'px;">'
    . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
function h5bs_social($color='default',$size='1x',$margin_left='5px',$circle=false,$circleBgColor='white',$circleColor='black'){
    ?>
    <ul class="social-icons no-bullet">
         <?php if ( get_option( 'client_twitter_url' ) ) { ?>
            <li class="fa" style="margin-left:<?=$margin_left;?>">
                <a class="color-<?= $color; ?>" href="<?php echo get_option( 'client_twitter_url' ); ?>" target="_blank">
                    <?php if ($circle === true): ?>
                        <span class="fa-stack fa-<?= $size; ?> color-<?= $circleBgColor; ?> m-right-15px">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x color-<?= $circleColor; ?>"></i>
                        </span>
                    <?php else: ?>
                        <i class="fa fa-twitter fa-<?= $size; ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ( get_option( 'client_facebook_url' ) ) { ?>
            <li class="fa" style="margin-left:<?=$margin_left;?>">
                <a class="color-<?= $color; ?>" href="<?php echo get_option( 'client_facebook_url' ); ?>" target="_blank">
                    <?php if ($circle === true): ?>
                        <span class="fa-stack fa-<?= $size; ?> color-<?= $circleBgColor; ?> m-right-15px">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x color-<?= $circleColor; ?>"></i>
                        </span>
                    <?php else: ?>
                        <i class="fa fa-facebook fa-<?= $size; ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ( get_option( 'client_linkedin_url' ) ) { ?>
            <li class="fa" style="margin-left:<?=$margin_left;?>">
                <a class="color-<?= $color; ?>" href="<?php echo get_option( 'client_linkedin_url' ); ?>" target="_blank">
                    <?php if ($circle === true): ?>
                        <span class="fa-stack fa-<?= $size; ?> color-<?= $circleBgColor; ?> m-right-15px">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-linkedin fa-stack-1x color-<?= $circleColor; ?>"></i>
                        </span>
                    <?php else: ?>
                        <i class="fa fa-linkedin fa-<?= $size; ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ( get_option( 'client_youtube_url' ) ) { ?>
            <li class="fa" style="margin-left:<?=$margin_left;?>">
                <a class="color-<?= $color; ?>" href="<?php echo get_option( 'client_youtube_url' ); ?>" target="_blank">
                    <?php if ($circle === true): ?>
                        <span class="fa-stack fa-<?= $size; ?> color-<?= $circleBgColor; ?> m-right-15px">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-youtube fa-stack-1x color-<?= $circleColor; ?>"></i>
                        </span>
                    <?php else: ?>
                        <i class="fa fa-youtube fa-<?= $size; ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ( get_option( 'client_instagram_url' ) ) { ?>
            <li class="fa" style="margin-left:<?=$margin_left;?>">
                <a class="color-<?= $color; ?>" href="<?php echo get_option( 'client_instagram_url' ); ?>" target="_blank">
                    <?php if ($circle === true): ?>
                        <span class="fa-stack fa-<?= $size; ?> color-<?= $circleBgColor; ?> m-right-15px">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-instagram fa-stack-1x color-<?= $circleColor; ?>"></i>
                        </span>
                    <?php else: ?>
                        <i class="fa fa-instagram fa-<?= $size; ?>" aria-hidden="true"></i>
                    <?php endif; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ( get_option( 'client_google_url' ) ) { ?>
            <li class="si-google">
                <a href="<?php echo get_option( 'client_google_url' ); ?>" target="_blank">Google+</a>
            </li>
        <?php } ?>
        <?php if ( get_option( 'client_pinterest_url' ) ) { ?>
            <li class="si-pinterest">
                <a href="<?php echo get_option( 'client_pinterest_url' ); ?>" target="_blank">Pinterest</a>
            </li>
        <?php } ?>
    </ul>
    <?php
}
function hopsie_share_buttons(){
    ?>
    <ul class="share-buttons">
        <li>
            <a href="https://twitter.com/intent/tweet?source=http%3A%2F%2F&text=:%20http%3A%2F%2F" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;">
                <span class="fa-stack fa-xl color-blue">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x color-white"></i>
                </span>
            </a>
        </li>
         <li>
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2F&title=&summary=&source=http%3A%2F%2F" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;">
                <span class="fa-stack fa-xl color-blue">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x color-white"></i>
                </span>
            </a>
        </li>
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">
                <span class="fa-stack fa-xl color-blue">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x color-white"></i>
                </span>
            </a>
        </li>
        <li>
            <a href="mailto:?subject=&body=:%20http%3A%2F%2F" target="_blank" title="Send email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;">
                <span class="fa-stack fa-xl color-blue">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-envelope fa-stack-1x color-white"></i>
                </span>
            </a>
        </li>
    </ul>
    <?php
}