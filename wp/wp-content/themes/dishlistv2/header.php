<?php
/**
 * The header for our theme
 *
 * @package Dishlist
 * @since 0.1.0
 * @version 0.0.1
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="site-branding">
            <?php 
            the_custom_logo();?>
            <h1>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <span class="site-title-clr">DISH</span>LIST
                </a>
            </h1>	
        </div><!-- .site-branding -->
            
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav><!-- #site-navigation -->
    </header>