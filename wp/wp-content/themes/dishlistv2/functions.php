<?php
// Load google fonts
function dishlist_add_google_fonts() 
{
    wp_enqueue_style(
        'dishlist-google-fonts', 
        'https://fonts.googleapis.com/css?family=Lato:400,700&display=swap', 
        false 
    ); 
}


// Load all Styles and Scripts
function dishlist_styles_and_scripts()
{
    wp_enqueue_style(
        'main-stylesheet',
        get_template_directory_uri() .'/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    wp_enqueue_script( 'dishlistv2-navigation', get_stylesheet_directory_uri().'/assets/js/navigation.js', array('jquery'),'1.0', true );
    wp_localize_script('dishlistv2-navigation','dishlistv2ScreenReaderText',array(
		'expand' => __('Expand child menu','dishlistv2'),
		'collapse' => __('Collapse child menu','dishlistv2'),
    ));
    
    wp_enqueue_script( 'dishlistv2-customizer', get_stylesheet_directory_uri().'/assets/js/customizer.js', array('jquery'),'1.0', true );
}


/**
* Sets up theme defaults and registers support for various WordPress features.
*/
function dishlist_setup() {
    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'dishlistv2' ),
        'social' => esc_html__( 'Social Media Menu', 'dishlistv2' ),
    ) );
    }

/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );
        

        
add_action( 'after_setup_theme', 'dishlist_setup' );    
add_theme_support('custom-logo');
add_action('wp_enqueue_scripts', 'dishlist_add_google_fonts' );
add_action('wp_enqueue_scripts', 'dishlist_styles_and_scripts');




