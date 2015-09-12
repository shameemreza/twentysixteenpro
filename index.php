<?php get_header(); ?>
    <div id="articles" class="two-third">  

	    <!-- category select -->
	    <?php 
		    $topic = get_option( 'reza_topic' );
		    if ( $topic['selector'] ) :
				get_template_part( 'inc/category-select' ); 
			endif;
		?>  
        <!-- /category select -->
         
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article <?php post_class( 'h-entry one-full' ); ?> id="post-<?php the_ID(); ?>">
                <h2 class="p-name entry-title"><a class="u-url" href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                
                <?php get_template_part( 'inc/postmeta' ); ?>
                
                <div class="clearfix"></div>
                
                <div class="p-summary entry-summary"><?php the_excerpt(); ?></div>
                <div class="updated entry-date hidden" title="<?php echo esc_html( get_the_date( "d-m-Y G:i:s" ) ); ?>"><?php echo esc_html( get_the_date( "d-m-Y G:i:s" ) ); ?></div>
                <div class="vcard author entry-author hidden"><span class="fn"><?php the_author(); ?></span></div>
                
                <div class="postmeta">
				    <?php if ( get_the_tags() ) : ?>
					    <span class="post-tags"><?php _e( "Tagged: ", "twentysixteen" ); ?> <?php the_tags( '', ' / ', '' ); ?></span>
				    <?php endif; ?>
				</div>
                
                <a class="button read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( "Continue Reading...", "twentysixteen" ); ?></a>
            </article>
        <?php endwhile; else : ?>
            <div class="alert alert-warning">
                <?php esc_html_e( "Sorry, there are no articles he just yet, pop back soon!", "twentysixteen" ); ?>
            </div>
        <?php endif; ?>
        
        <?php get_template_part('inc/pagination'); ?>
  
    </div>
    <?php get_sidebar(); ?>
<?php get_footer(); ?>