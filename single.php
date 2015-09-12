<?php get_header(); ?>	
    <div id="articles" class="four-fifth">
	    
        <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                $sr_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'twentysixteen-blog' ); 
        ?>
            <article <?php post_class( 'h-entry post one-full' ); ?> id="post-<?php the_ID(); ?>">
                <?php get_template_part( 'inc/postmeta' ); ?>
				
				<div class="clearfix"></div>
				
                <div class="e-content entry-content"><?php the_content(); ?></div>

                <div class="updated entry-date hidden" title="<?php echo esc_html( get_the_date( "d-m-Y G:i:s" ) ); ?>"><?php echo esc_html( get_the_date( "d-m-Y G:i:s" ) ); ?></div>
                <div class="vcard author entry-author hidden"><span class="fn"><?php the_author(); ?></span></div>
				
                <?php get_template_part( 'inc/post-footer' ); ?>
            </article>
        <?php endwhile; endif; ?>
        
        <?php if ( comments_open() ) : ?>
	        <section id="commentbox">
	            <?php comments_template(); ?>
	        </section>
        <?php endif; ?>
        
    </div>
<?php get_footer(); ?>