<?php
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'inc/theme-options.php' );


if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'bluebead_setup' ) ) :

function bluebead_setup() {
	require( get_template_directory() . '/inc/template-tags.php' );

	require( get_template_directory() . '/inc/extras.php' );
	
	require( get_template_directory() . '/inc/customizer.php' );
	load_theme_textdomain( 'bluebead', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bluebead' ),
	) );
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // bluebead_setup
add_action( 'after_setup_theme', 'bluebead_setup' );

function bluebead_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'bluebead_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'bluebead_register_custom_background' );

function bluebead_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bluebead' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bluebead_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function carousel_init_method() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
		
    wp_enqueue_script( 'carousel', get_template_directory_uri().'/js/jquery.waterwheelCarousel.min.js', array( 'jquery' ) );
}
add_action('wp_enqueue_scripts', 'carousel_init_method'); 

 
function bluebead_scripts() {
	wp_enqueue_style( 'bluebead-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bluebead-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bluebead-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'bluebead-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'bluebead_scripts' );
