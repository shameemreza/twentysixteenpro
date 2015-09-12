<aside id="slideout" class="sidebar">    
 	<!-- primary nav area -->
	<div id="primary" class="widget">
		<h6><?php esc_html_e( "Navigate", "twentysixteen" ); ?></h6>
        <nav class="navigation">
            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'nav', 'theme_location' => 'primary_menu' ) ); ?>
        </nav>
    </div>
    <!-- /primary nav area -->
    
    <?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Slideout Widgets' ) ) : ?>
		<?php // widgets load here ?>
	<?php endif; ?>
	
	<!-- tweets -->
	<?php
        $modules = get_option( 'reza_modules' );
        if ( $modules['tweets'] ) : get_template_part('inc/twitter'); endif;
    ?>
	<!-- /tweets -->
</aside>