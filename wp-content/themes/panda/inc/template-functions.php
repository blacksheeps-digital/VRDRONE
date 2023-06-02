<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package panda
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function panda_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'panda_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function panda_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'panda_pingback_header' );

/** 
 * Disable gutemberg 
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);


// Função para atualizar a logo do WordPress na página de login
function panda_vr_drones_custom_login_logo() {
    // Verifica se o campo ACF está preenchido
    $image_url = get_field('logo', 'options');
    if ($image_url) {
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url($image_url); ?>) !important;
                background-size: contain !important;
                width: auto !important;
                height: 100px !important;
                pointer-events: none !important;
            }
        </style>
        <?php
    }
}
add_action('login_enqueue_scripts', 'panda_vr_drones_custom_login_logo');
