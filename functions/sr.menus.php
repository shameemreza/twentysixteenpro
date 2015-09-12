<?php
// menu support
add_theme_support('menus');

// register menu
add_action( 'init', 'reza_register_menus' );

function reza_register_menus() 
{
	register_nav_menus(
		array(
			'primary_menu' 	 => __( 'Primary Menu', 'twentysixteen' )
		)	
	);
}