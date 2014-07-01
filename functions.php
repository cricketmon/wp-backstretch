<?php
/** full background */
add_action( 'wp_enqueue_scripts', 'enqueue_backstretch' );
function enqueue_backstretch() {

    /** Load scripts only on single Posts, static Pages and other single pages and only if featured image is present */
    if ( is_singular() && has_post_thumbnail() )

        wp_enqueue_script( 'backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.backstretch.min.js', array( 'jquery' ), '1.0.0' );
        wp_enqueue_script( 'backstretch-set', get_bloginfo('stylesheet_directory').'/js/backstretch-set.js' , array( 'jquery', 'backstretch' ), '1.0.0' );

        wp_localize_script( 'backstretch-set', 'BackStretchImg', array( 'src' => wp_get_attachment_url( get_post_thumbnail_id() ) ) );

}