<!-- social share -->
<div id="social-share">
	<p><i class="icon-share-alt"></i> <?php esc_html_e( " Share: ", "lt"); ?></p>
    <a class="social-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( wp_get_shortlink() ); ?>" target="_blank">
        <i class="icon-facebook-square"></i> 
    </a>
    <a class="social-twitter" href="http://twitter.com/share?url=<?php echo esc_url( wp_get_shortlink() ); ?>&text=<?php the_title(); ?>&hashtags=<?php echo bloginfo('name'); ?>" target="_blank">
        <i class="icon-twitter-square"></i>
    </a>
    <a class="social-google" href="https://plus.google.com/share?url=<?php echo esc_url( wp_get_shortlink() ); ?>" target="_blank">
        <i class="icon-google-plus-square"></i>
    </a>
    <a class="social-email" href="mailto:?subject=I wanted to share this post with you from <?php echo esc_url( bloginfo( 'name' ) ); ?>&body=<?php the_title( '','',true ); ?>&#32;&#32;<?php echo esc_url( wp_get_shortlink() ); ?>" title="Email to a friend">
	    <i class="icon-envelope"></i>
	</a>
</div>
<!-- /social share -->

<!-- author bio -->
<hr>
<div id="author-bio">
	<a href="<?php the_author_meta( 'user_url' ); ?>">
		<?php echo get_avatar( get_the_author_meta('email'), '75' ); ?>
	</a>
	<div class="author-info">
		<h6><?php esc_html_e( "About the Author", "twentysixteen" ); ?></h6>
		<p><?php the_author_meta('description'); ?></p>
	</div>
</div>
<!-- /author bio -->

<!-- related -->
<?php 
    $orig_post  = $post;
    global $post;
    $categories = get_the_category($post->ID);
    
    if ($categories) 
    {
    ?>
    <hr>
    <?php $category_ids = array();

        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
            $args=array(
                'category__in'     => $category_ids,
                'post__not_in'     => array($post->ID),
                'posts_per_page'   => 2,
                'ignore_sticky_posts' => 1,
                'orderby'		   => 'rand'
            );
            
            $query = new wp_query( $args );

            if ( $query->have_posts() ) 
            {
                $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog' ); 
                
                echo '<div id="related-posts"><h5>You may also like</h5><ul class="nolist">';
                
                while( $query->have_posts() ) 
                {
                    $query->the_post();
                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog' ); 
                ?>
                    <li class="one-half">
                        <h6 class="p-name entry-title">
                            <a class="u-url" href="<?php the_permalink(); ?>">
                               	<?php the_title(); ?>
                            </a>
                        </h6>
                        <p class="p-summary entry-summary"><?php echo esc_html( reza_excerpt(25) ); ?></p>
                        <p><a class="u-url" href="<?php the_permalink(); ?>">continue reading</a></p>
                        <span class="updated hidden" title="<?php get_the_date( "d-m-Y G:i:s" ); ?>"></span>
                    </li>
            <?php
                }
                echo '</ul></div><hr>';
            }
    }
    $post = $orig_post;
    wp_reset_postdata(); 
?>
<!-- /related -->