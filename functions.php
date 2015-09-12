<?php
function reza_setup()
{
    // Add theme support
    add_image_size( 'twentysixteen-blog', 700, 500, true );
    add_image_size( 'twentysixteen-header', 1280, 1024, true );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    // Content width
    if ( ! isset( $content_width ) )
    {
    	$content_width = 1280;
    }

    // Localization support
    load_theme_textdomain( 'twentysixteen', get_template_directory_uri() . '/language' );

    // Add admin link to custom css file
    function reza_css_submenu_page()
    {
    	add_theme_page( 'Custom CSS', 'Custom CSS', 'edit_theme_options', 'theme-editor.php?file=custom.css&theme=twentysixteen', '', '' );
    }
    add_action('admin_menu', 'reza_css_submenu_page');
}
add_action( 'after_setup_theme', 'reza_setup' );

// Load individual function files
require_once( get_template_directory() . '/functions/sr.customizer.php' );
require_once( get_template_directory() . '/functions/sr.menus.php' );
require_once( get_template_directory() . '/functions/sr.widgets.php' );
require_once( get_template_directory() . '/functions/sr.shortcodes.php' );
require_once( get_template_directory() . '/functions/sr.minify.php' );

// Load theme stuff for frontend only
if ( ! is_admin() )
{     
    // wp_title filter
    function reza_wp_title( $title, $sep ) 
    {
    	if ( is_feed() ) 
    	{
    		return $title;
    	}
    	
    	global $page, $paged;
    
    	// add the blog name
    	$title .= get_bloginfo( 'name', 'display' );
    
    	// add the blog description for the front page.
    	$site_description = get_bloginfo( 'description', 'display' );
    	
    	if ( $site_description && ( is_home() || is_front_page() ) ) 
    	{
    		$title .= " $sep $site_description";
    	}
    
    	// add a page number if necessary
    	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) 
    	{
    		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    	}
    
    	return $title;
    }
    add_filter( 'wp_title', 'reza_wp_title', 10, 2 );

    // Excerpt length for display purposes
    function reza_excerpt_length( $length )
    {
    	return 75;
    }
    add_filter( 'excerpt_length', 'reza_excerpt_length', 999 );

    // Excerpt more
    function reza_excerpt_more( $more )
    {
    	return '...';
    }
    add_filter('excerpt_more', 'reza_excerpt_more');
    
    // custom excerpt
    function reza_excerpt( $limit ) 
    {
        $excerpt = explode( ' ', get_the_excerpt(), $limit );
        
        if ( count( $excerpt ) >= $limit) 
        {
            array_pop( $excerpt );
            $excerpt = implode( " ", $excerpt ) . '...';
        } 
        else 
        {
            $excerpt = implode( " ", $excerpt );
        } 
        $excerpt = preg_replace( '`\[[^\]]*\]`','', $excerpt );
        $excerpt = strip_tags($excerpt);
        return $excerpt;
    }
    
    // custom content
    function reza_content( $limit ) 
    {
        $content = explode( ' ', get_the_content(), $limit );
        
        if ( count( $content ) >= $limit ) 
        {
            array_pop( $content );
            $content = implode( " ", $content ) . '...';
        } 
        else 
        {
            $content = implode( " ", $content );
        } 
        $content = preg_replace( '/\[.+\]/','', $content );
        $content = apply_filters( 'the_content', $content ); 
        $content = str_replace( ']]>', ']]&gt;', $content );
        return $content;
    }
    
    // short title
    function reza_title( $before = '', $after = '', $echo = true, $length = false ) 
    { 
        $title = get_the_title();

        if ( $length && is_numeric( $length ) ) 
        {
		    $title = substr( $title, 0, $length );
	    }

        if ( strlen( $title ) > 0 ) 
        {
		    $title = apply_filters( 'reza_title', $before . $title . $after, $before, $after );
            if ( $echo )
            {
			    echo $title;
            }
            else
            {
			    return $title;
            }
	    }
    }
	
    // Search Function
    function reza_search_filter( $query )
    {
    	if ( $query->is_search )
    	{
    		$query->set( 'post_type', array( 'post', 'product' ) );
    	}
    	return $query;
    }
    add_filter( 'pre_get_posts', 'reza_search_filter' );

    // Enqueue styles
    function reza_theme_styles()
    {
		wp_enqueue_style( 'fonts', "//fonts.googleapis.com/css?family=Slabo+13px|Roboto:400,400italic,500,500italic,700,700italic,900,900italic", '', 'reza-1.0', 'screen' );
        wp_enqueue_style( 'style', get_stylesheet_uri(), '', 'reza-1.0', 'screen', true );
    }
    add_action( 'wp_enqueue_scripts', 'reza_theme_styles' );

    // Enqueue scripts
	function reza_theme_scripts()
	{
 		// wp_enqueue_script() syntax, $handle, $src, $deps, $version, $in_footer(boolean)
 		wp_enqueue_script( 'twentysixteen-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '1.0.0', true );
 		wp_enqueue_script( 'twentysixteen-application', get_template_directory_uri() . '/assets/js/application.js', array( 'jquery' ), '1.0.0', true );
 		wp_enqueue_script( 'twentysixteen-prettify', '//google-code-prettify.googlecode.com/svn/loader/run_prettify.js', array( 'jquery' ), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'reza_theme_scripts');
}