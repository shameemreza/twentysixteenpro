<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- title -->
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    
    <?php $favicon = get_option( 'reza_favicon' ); if ( $favicon['icon'] ) : ?>
	    <link rel="shortcut icon" href="<?php echo esc_url( $favicon['icon'] ); ?>">
	<?php endif; ?>
	
    <!-- wp head -->
    <?php if ( is_singular() ) { wp_enqueue_script('comment-reply'); } wp_head(); ?>
</head>
<!-- /head -->

<body id="index" <?php body_class(); ?>>
	
	<!-- push div to control sidebar slide out -->
	<div id="push">

	    <?php if ( ! is_404() ) : ?>
	        <!-- setup vars -->
	        <?php 
		        $sr_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'twentysixteen-header' ); 
		        $background = get_option( 'reza_background' ); 
		    ?>
	        <!-- /setup vars -->
	        
	        <?php if ( $sr_featured_image && ! is_front_page() ) : ?> 
	        	<?php if ( is_single() || is_page() ) : ?>
	        		<div id="image-background" style="background: url(<?php echo esc_url( $sr_featured_image[0] ); ?>) no-repeat center center;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;position:fixed;"></div>
	        	<?php endif; ?>
	        <?php endif;  ?>
	        
	        <?php if ( ! is_single() && ! is_page() ) : ?> 
				<div id="image-background" style="background: url(<?php echo esc_url( $background['image'] ); ?>) no-repeat center center;-webkit-background-size:cover;-moz-background-size:cover;background-size:cover;position:fixed;"></div>
			<?php endif; ?>
			
			
			<!-- header -->
			<header id="main" class="one-third">
				<div id="header-inner">
					
					<?php if ( ! is_front_page() || is_single() || is_page() ) : ?>
						<!-- page title -->
						<div id="page-title">
		        			<h1 class="p-name entry-title"><?php the_title(); ?></h1>
		        			<?php get_template_part( 'inc/postnavi' ); ?>
		        		</div>
						<!-- /page title -->
		        	<?php else : ?>
		        		<!-- logo -->
			            <div id="site-logo">
			        	    <?php $logo = get_option( 'reza_logo' ); if ( $logo['image'] ) : ?>
			        	        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			        	            <img src="<?php echo esc_url( $logo['image'] ); ?>" alt="<?php echo esc_html( bloginfo( 'name' ) ); ?>" />
			        	            <br>
			        	            <p class="desc"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
			        	        </a>
			        	    <?php else : ?>
			        			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			        				<h1><?php echo esc_html( bloginfo( 'name' ) ); ?><span class="accent">.</span></h1>
				        			<br>
			        				<p class="desc"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
			        			</a>
			                <?php endif; ?>
			        	</div>
			        	<!-- /logo -->
		        	<?php endif; ?>
			        
			        <!-- social -->
	                <div id="social">
	                    <?php $social = get_option( 'reza_social' ); if ( $social ) : get_template_part( 'inc/social' ); endif; ?>
	                </div>
	                <!-- /social -->
		        
				</div>
			</header>
			<!-- /header -->
			
			<!-- slide toggle -->
	        <a class="slideout-toggle" href="#"><i class="icon-navicon"></i></a>
	        <!-- /slide toggle -->
	
	        <!-- content -->
	        <div id="content" class="two-third">
		        
		        <!-- reading progress -->
		        <progress value="0">
					<div class="progress-container">
				    	<span class="progress-bar"></span>
				  	</div>
				</progress>
		        <!-- /reading progress -->
	    <?php endif; ?>