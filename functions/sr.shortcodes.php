<?php
// columns
function reza_one_full_shortcode($atts, $content = null)
{
   return '<div class="one-full">'.do_shortcode($content).'</div>';
}
add_shortcode('one full', 'reza_one_full_shortcode');

function reza_one_half_shortcode($atts, $content = null)
{
   return '<div class="one-half">'.do_shortcode($content).'</div>';
}
add_shortcode('one half', 'reza_one_half_shortcode');

function reza_one_third_shortcode($atts, $content = null)
{
   return '<div class="one-third">'.do_shortcode($content).'</div>';
}
add_shortcode('one third', 'reza_one_third_shortcode');

function reza_two_third_shortcode($atts, $content = null)
{
   return '<div class="two-third">'.do_shortcode($content).'</div>';
}
add_shortcode('two third', 'reza_two_third_shortcode');

function reza_one_quarter_shortcode($atts, $content = null)
{
   return '<div class="one-quarter">'.do_shortcode($content).'</div>';
}
add_shortcode('one quarter', 'reza_one_quarter_shortcode');

function reza_one_fifth_shortcode($atts, $content = null)
{
   return '<div class="one-fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('one fifth', 'reza_one_fifth_shortcode');

function reza_two_fifth_shortcode($atts, $content = null)
{
   return '<div class="two-fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('two fifth', 'reza_two_fifth_shortcode');

function reza_three_fifth_shortcode($atts, $content = null)
{
   return '<div class="three-fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('three fifth', 'reza_three_fifth_shortcode');

function reza_four_fifth_shortcode($atts, $content = null)
{
   return '<div class="four-fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('four fifth', 'reza_four_fifth_shortcode');

// boxed
function reza_boxed_shortcode($atts, $content = null)
{
   return '<div class="boxed">'.do_shortcode($content).'</div>';
}
add_shortcode('boxed', 'reza_boxed_shortcode');

// snippet
function reza_snippet_shortcode($atts, $content = null)
{
   return '<p class="snippet">'.do_shortcode($content).'</p>';
}
add_shortcode('snippet', 'reza_snippet_shortcode');

// Google map
function reza_google_map_shortcode( $atts )
{
    extract(shortcode_atts(array(
        "zip"     => ''
	), $atts ) );

    if ( $zip ) :
    	$form = '
    	<div id="gmap">
    	    <div id="map-overlay" class="map-overlay"></div>
            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="//maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$zip.'&amp;ie=UTF8&amp;&amp;z=12&amp;iwloc=near&amp;output=embed"></iframe>
        </div>
        ';
    endif;

    return $form;
}
add_shortcode( 'google-map', 'reza_google_map_shortcode' );

// Video
function reza_video_shortcode($atts) {
	extract(shortcode_atts(array(
		"src" => '',
	), $atts));
	
	return '<iframe src="'.$src.'" frameborder="0" allowfullscreen></iframe>';
}
add_shortcode("video", "reza_video_shortcode");