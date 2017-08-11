<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    
    // Register Foundation scripts
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation-sites/dist/js/foundation.min.js', array( 'jquery' ), "6.4.1", true );
            
    // Register Foundation styles
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/foundation-sites/dist/css/foundation.min.css', array(), "6.4.1", 'all' );
     
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts'), true );
       
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);