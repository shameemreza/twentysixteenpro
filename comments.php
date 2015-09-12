<ul class="nolist" id="comments" data-scroll-reveal>
	<?php $comment_avatar = wp_list_comments(array('avatar_size' => 60)); ?>
</ul>

<?php if ( get_option('page_comments') ) : ?>
    <div class="pagination">
      	<?php paginate_comments_links(); ?> 
    </div>
<?php endif; ?>

<div data-scroll-reveal>
    <?php comment_form(); ?>
</div>