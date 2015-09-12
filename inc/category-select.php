<div id="category-select">
    <?php 
        $args = array(
        	'show_option_all'    => '&mdash; Filter by Topic &mdash;',
        	'show_option_none'   => '',
        	'orderby'            => 'name', 
        	'order'              => 'ASC',
        	'show_count'         => 1,
        	'hide_empty'         => 1, 
        	'child_of'           => 0,
        	'exclude'            => '',
        	'echo'               => 1,
        	'selected'           => 0,
        	'hierarchical'       => 0, 
        	'name'               => 'cat',
        	'id'                 => '',
        	'class'              => 'postform',
        	'depth'              => 0,
        	'tab_index'          => 0,
        	'taxonomy'           => 'category',
        	'hide_if_empty'      => true,
        );
        wp_dropdown_categories( $args );
    ?>
    <script type="text/javascript">
    	<!--
    	var dropdown = document.getElementById("cat");
    	function onCatChange() {
    		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
    			location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
    		}
    	}
    	dropdown.onchange = onCatChange;
    	-->
    </script>
</div>