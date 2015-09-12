<?php get_header(); ?>
    <div id="page" class="four-fifth">
        <?php if ( ! is_front_page() ) : ?>
			<h2><?php the_title(); ?></h2>
		<?php endif; ?>
        <?php 
            if ( have_posts()) : 
        	    while ( have_posts() ) : the_post();
                    global $more; $more = 0; the_content();	
                endwhile; 
            endif;
        ?>
        
        <!-- comments -->
        <?php if ( comments_open() ) : ?>
	        <div id="commentbox">
		        <div class="boxed">
		            <?php comments_template(); ?>
		        </div>
	        </div>
        <?php endif; ?>
        <!-- /comments -->
    </div>
<?php get_footer(); ?>