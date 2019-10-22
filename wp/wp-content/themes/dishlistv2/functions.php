<?php
// Load google fonts
function dishlist_add_google_fonts() 
{
    wp_enqueue_style(
        'dishlist-google-fonts', 
        'https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i&display=swap', 
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
}


 
add_action('wp_enqueue_scripts', 'dishlist_add_google_fonts' );
add_action('wp_enqueue_scripts', 'dishlist_styles_and_scripts');