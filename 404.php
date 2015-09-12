<?php get_header(); ?>
	<div class="boxed">
	    <div id="fourohfour">
	
		    <?php $logo = get_option( 'reza_logo' ); if ( $logo['image'] ) : ?>
		        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		            <img src="<?php echo esc_url( $logo['image'] ); ?>" alt="<?php echo esc_html( bloginfo( 'name' ) ); ?>" />
		        </a>
		    <?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<h1><?php echo esc_html( bloginfo( 'name' ) ); ?><span class="accent">.</span></h1>
				</a>
	        <?php endif; ?>
	        
	        <h5><?php esc_html_e( '404 Not Found.', 'twentysixteen'); ?></h5> 
	        <p><?php esc_html_e( "It appears that you've lost your way, either through an outdated link or a typo on the page you were trying to reach.", "twentysixteen" ); ?></p>
	        
	        <a class="button" href="<?php echo esc_url( home_url() ); ?>" class="textcenter aligncenter">
	            <i class="icon-compass"></i> <?php esc_html_e( 'Navigate Home', 'twentysixteen' ); ?>
	        </a>
	        
	    </div>
	</div>
<?php get_footer(); ?>