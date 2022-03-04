<?php

/**
 * TomoTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TomoTheme
 */

add_action('init', function () {
	register_post_type('news', [
		'label' => 'ニュース',
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'supports' => ['thumbnail', 'title', 'editor']
	]);
});

global $wp_rewrite;
$wp_rewrite->flush_rules();

//抜粋の文字数を変更
function twpp_change_excerpt_length($length)
{
	return 50;
}
add_filter('excerpt_length', 'twpp_change_excerpt_length', 999);

//抜粋の続きを読むボタンを変更
function twpp_change_excerpt_more($more)
{
	$html = '<a class="button-style-none-w purple_str" href="' . esc_url(get_permalink()) . '">[...続きを読む]</a>';
	return $html;
}

add_filter('excerpt_more', 'twpp_change_excerpt_more');

/* 投稿アーカイブページの作成 */
function post_has_archive($args, $post_type)
{

	if ('post' == $post_type) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'works'; //任意のスラッグ名
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);



if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tomotheme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on TomoTheme, use a find and replace
		* to change 'tomotheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('tomotheme', get_template_directory() . '/languages');

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
			'menu-1' => esc_html__('Primary', 'tomotheme'),
			'menu-2' => esc_html__('Footer', 'tomotheme'),
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
			'tomotheme_custom_background_args',
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
add_action('after_setup_theme', 'tomotheme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tomotheme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('tomotheme_content_width', 640);
}
add_action('after_setup_theme', 'tomotheme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tomotheme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'tomotheme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'tomotheme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'tomotheme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function tomotheme_scripts()
{
	wp_enqueue_style('tomotheme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('tomotheme-style', 'rtl', 'replace');

	wp_enqueue_script('tomotheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'tomotheme_scripts');

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
