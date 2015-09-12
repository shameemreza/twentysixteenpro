<div class="postnavi">
	<ul class="nolist">
    	<?php if ( is_page() ) : ?>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Home"><i class="icon-home"></i></a></li>
    		<li><a class="toggle-image" href="#" title="View Image"><i class="icon-expand"></i></a></li>
    	<?php else : ?>
    		<li class="prev"><?php previous_post_link('%link', '<i class="icon-chevron-left"></i>'); ?></li>
			<li><a href="<?php echo esc_url( home_url() ); ?>" title="Home"><i class="icon-home"></i></a></li>
			<li><a class="toggle-image" href="#" title="View Image"><i class="icon-expand"></i></a></li>
			<li class="next"><?php next_post_link('%link', '<i class="icon-chevron-right"></i>'); ?></li>
    	<?php endif; ?>
    </ul>
</div>