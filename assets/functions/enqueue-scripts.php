<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	// Removes WP version of jQuery
	wp_deregister_script('jquery');
	
	// Load vendor files (jQuery and what-input by default) in footer
    wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '', true );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.js', array( 'vendor' ), '6.0', true );
    
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'vendor' ), '', true );
   
	 // Register Normalize
    wp_enqueue_style( 'normalize-css', get_template_directory_uri() . '/vendor/normalize/normalize.css', array(), '', 'all' );
	
	// Register Foundation styles
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/vendor/foundation/css/foundation.min.css', array(), '', 'all' );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);