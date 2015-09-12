	    <?php if ( ! is_404() ) : ?>
	        </div>
	    	<!-- /content -->
	    	
	    	<!-- copyright -->
	        <div id="copyright"><?php esc_html_e( "Copyright", "twentysixteen" ); ?> &copy; <?php echo esc_html( date('Y') ); ?> <?php echo esc_html( bloginfo( 'name' ) ); ?></div>
	        <!-- /copyright -->
	    <?php endif; ?>
   
    </div>
    <!-- /push div to control sidebar slide out -->
    
    <!-- slideout sidebar -->
    <?php get_sidebar( 'toggle' ); ?>
    <!-- /slideout sidebar -->
    
    <p style="display:none;"><a href="//shameemreza.com" title="Full Stack WordPress Developer">Shameem Reza</a></p>
    
<!-- wp footer hook -->
<?php wp_footer(); ?>
	
</body> 
</html>