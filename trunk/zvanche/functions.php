<?php

define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH . "/images");

function getImage($path, $alt, $class, $style) {
    return printf("<img src='%s' alt='%s' class='%s' style='%s' />", IMAGES . $path, $alt, $class, $style);
}

add_theme_support('nav-menus');
add_theme_support( 'post-thumbnails' ); 

if (function_exists('register_nav_menus')) {
    register_nav_menus(
            array(
                'main' => 'Main Nav'
            )
    );
}

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array (
		'name' => __( 'Основна странична лента', 'primary-sidebar' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Избрани джаджи за основна странична лента', 'dir' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => "</div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}


require( get_template_directory() . '/ext/widgets.php' );
register_widget( 'WP_Recent_Posts_Thumbnails' );
?>