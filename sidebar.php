<aside id="main-sidebar" class="one-third sidebar notmobile">
    <?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Sidebar Widgets' ) ) : ?>
		<?php // widgets load here ?>
	<?php endif; ?>
</aside>