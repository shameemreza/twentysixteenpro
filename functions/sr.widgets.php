<?php
// Widgets
if ( function_exists( 'register_sidebar' ) ) 
{
    function reza_theme_widgets_init() 
    {
    	register_sidebar(
    		array(
    			'name'			=> 'Sidebar Widgets',
    			'id' 			=> 'sidebar_widgets',
    			'before_widget' => '<div id="%1$s" class="widget">',
    			'after_widget' 	=> '</div>',
    			'before_title' 	=> '<h6>',
    			'after_title' 	=> '</h6>',
    		)
    	);
    	
    	register_sidebar(
    		array(
    			'name'			=> 'Slideout Widgets',
    			'id' 			=> 'slideout_widgets',
    			'before_widget' => '<div id="%1$s" class="widget">',
    			'after_widget' 	=> '</div>',
    			'before_title' 	=> '<h6>',
    			'after_title' 	=> '</h6>',
    		)
    	);
	}
	add_action( 'widgets_init', 'reza_theme_widgets_init' );
}