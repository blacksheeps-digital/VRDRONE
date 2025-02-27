<?php

/**
 * panda functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package panda
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
	define('IMG', trailingslashit(get_template_directory_uri()) . 'assets/images/');
	if (!defined('SITE')) define('SITE', get_bloginfo('url'));
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function panda_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on panda, use a find and replace
		* to change 'panda' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('panda', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'panda'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'panda_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'panda_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function panda_content_width()
{
	$GLOBALS['content_width'] = apply_filters('panda_content_width', 640);
}
add_action('after_setup_theme', 'panda_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function panda_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'panda'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'panda'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'panda_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function panda_scripts()
{
	wp_style_add_data('panda-style', 'rtl', 'replace');
	wp_enqueue_style('panda-style-font', get_template_directory_uri() . '/assets/fonts/stylesheet.css');
	wp_enqueue_style('panda-style-site', get_template_directory_uri() . '/assets/css/app.css');
	wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css');
	wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	wp_enqueue_style('aos-theme', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
	wp_enqueue_style('lity-theme', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css');

	wp_enqueue_script('panda-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);
	wp_enqueue_script('panda-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('panda-bs', get_template_directory_uri() . '/assets/js/vendor/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('panda-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), null, true);
	wp_enqueue_script('panda-lity', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js', array(), null, true);
	wp_enqueue_script('panda-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
	wp_enqueue_script('panda-app', get_template_directory_uri() . '/assets/js/app.min.js', array(), _S_VERSION, true);



	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'panda_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Função para obter os termos da taxonomia "tipos-de-servicos"
function get_servico_taxonomy_options()
{
	$terms = get_terms(array(
		'taxonomy' => 'tiipos-de-servicos',
		'hide_empty' => false,
	));

	$options = array();
	if ($terms) {
		$options['Selecione'] = 'Selecione o tipo de serviço';
		foreach ($terms as $term) {
			$options[$term->slug] = $term->name;
		}
	}

	return $options;
}

// Filtro para adicionar as opções do select ao formulário do Contact Form 7
add_filter('wpcf7_form_tag', 'custom_cf7_select_servico_taxonomy', 10, 2);
function custom_cf7_select_servico_taxonomy($tag, $unused)
{
	if ($tag['name'] != 'servico_taxonomy') {
		return $tag;
	}

	$tag['raw_values'] = '';
	$tag['values'] = get_servico_taxonomy_options();

	return $tag;
}

// Crie os termos na taxonomia 'tiipos-de-servicos'
function criar_termos_taxonomia_tipos_de_servicos() {
    $termos = array(
        'Tour Virtual',
        'Trabalho com Drones',
        'Trabalhos para Telecomunicações',
    );

    foreach ($termos as $termo) {
        wp_insert_term($termo, 'tiipos-de-servicos'); // Correção no nome da taxonomia
    }
}
add_action('init', 'criar_termos_taxonomia_tipos_de_servicos');


