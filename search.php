<?php get_header(); ?>	
	<div id="articles" class="two-third">   
		
		<?php if ( have_posts() ) : ?>
			<article class="search hentry h-entry post">
				<h4 class="p-name">
					<?php 
						esc_html_e( 'Search Results for ', "twentysixteen" ); 
						
						$allsearch = new WP_Query("s=$s&showposts=-1"); 
						$key = esc_html($s, 1); $count = $allsearch->post_count; 
						
						print( '<span class="highlight">'.$key.'</span><br>' ); 
						print( '<small>'.$count.' article(s) found.</small>' ); 
						
						wp_reset_postdata(); 
					?>
				</h4>
			</article>
			
			<hr>
			
			<?php while ( have_posts() ) : the_post(); ?>
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
				<article class="search hentry h-entry post">
					<h4 class="p-name">
						<?php 
							esc_html_e( 'Search Results for ', "twentysixteen" ); 
							
							$allsearch = new WP_Query("s=$s&showposts=-1"); 
							$key = esc_html($s, 1);
							
							print( '<span class="highlight">'.$key.'</span><br>' ); 
							print( '<small>0 article(s) found. Maybe these may be of interest instead?</small>' ); 
							
							wp_reset_postdata(); 
						?>
					</h4>
				</article>
		
				<hr>
		
				<?php
					$args = array(
						'posts_per_page' => 3,
						'orderby'        => 'rand',
						'post__not_in'   => get_option( 'sticky_posts' )
					);
					$rand = new WP_Query( $args );
				?>
				<?php while( $rand->have_posts() ) : $rand->the_post(); ?>
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
				<?php endwhile; ?>
		<?php endif; ?>
		
		<?php get_template_part('inc/pagination'); ?>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>