<?php

// hook
add_action( 'customize_register', 'reza_customize_register' );

// register customizer
function reza_customize_register( $wp_customize )
{
    // custom classes extending WP_Customize_Control
    class Reza_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
     
        public function render_content() 
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }
    
    // branding
	$wp_customize->add_panel( 'branding', 
		array(
	    	'title'       => 'Branding',
			'description' => 'Logo & favicon.',
			'priority'    => 150,
		) 
	);
    /* logo */
    $wp_customize->add_section(
        'reza_logo',

        array(
            'title'    => __( 'Logo', 'twentysixteen' ),
            'priority' => 130,
            'panel'	   => 'branding',
        )
    );
    $wp_customize->add_setting( 
        'reza_logo[image]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
            $wp_customize, 
            'logo', 
            
            array(
                'label'    => __( 'Logo', 'twentysixteen'),
                'section'  => 'reza_logo',
                'settings' => 'reza_logo[image]',
            ) 
        ) 
    );
    /* favicon */
    $wp_customize->add_section(
        'reza_favicon',

        array(
            'title'    => __( 'Favicon', 'twentysixteen' ),
            'priority' => 131,
            'panel'    => 'branding',
        )
    );
    
    $wp_customize->add_setting( 
        'reza_favicon[icon]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
            $wp_customize, 
            'icon', 
            
            array(
                'label'    => __( 'Favicon', 'twentysixteen'),
                'section'  => 'reza_favicon',
                'settings' => 'reza_favicon[icon]',
            ) 
        ) 
    );
    
    
    
    
    
    // styling
	$wp_customize->add_panel( 'styling', 
		array(
	    	'title'       => 'Styling',
			'description' => 'Styling options.',
			'priority'    => 151,
		) 
	);
    /* main image */
    $wp_customize->add_section(
        'reza_background',

        array(
            'title'    => __( 'Background Image', 'twentysixteen' ),
            'priority' => 132,
            'panel'    => 'styling',
        )
    );
    $wp_customize->add_setting( 
        'reza_background[image]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
            $wp_customize, 
            'image', 
            
            array(
                'label'    => __( 'Default background image', 'twentysixteen'),
                'section'  => 'reza_background',
                'settings' => 'reza_background[image]',
            ) 
        ) 
    );
    /* colors */
    $wp_customize->add_section(
        'reza_styling',

        array(
            'title'    => __( 'Colors', 'twentysixteen' ),
            'priority' => 133,
            'panel'    => 'styling',
        )
    ); 
    // accent
    $wp_customize->add_setting(
        'reza_styling[accent_color]',

        array(
            'default'    => '#a89d7a',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'background_color',

            array(
                'label'    => __( 'Accent Color', 'twentysixteen' ),
                'section'  => 'reza_styling',
                'settings' => 'reza_styling[accent_color]',
                'priority' => 10,
            )
        )
    );
    
    
    
    
     /* topic selector */
    $wp_customize->add_section(
        'reza_topic',

        array(
            'title'    => __( 'Topic Selector', 'twentysixteen' ),
            'priority' => 134,
        )
    );
    
    // selector
    $wp_customize->add_setting(
        'reza_topic[selector]', 
        
        array(
            'default'    => false,
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'selector', 
        
        array(
            'settings' => 'reza_topic[selector]',
            'label'    => __('Enable the Topic Selector above Articles.', 'twentysixteen'),
            'section'  => 'reza_topic',
            'type'     => 'checkbox',
            'priority' => 11,
        )
    );
	
	
	// social
	$wp_customize->add_panel( 'social', 
		array(
	    	'title'       => 'Social',
			'description' => 'Social options.',
			'priority'    => 152,
		) 
	);
    /* twitter */
    $wp_customize->add_section(
        'reza_modules',

        array(
            'title'    => __( 'Twitter Feed', 'twentysixteen' ),
            'priority' => 135,
            'panel'	   => 'social',
        )
    );
    // twitter feed
    $wp_customize->add_setting(
        'reza_modules[tweets]', 
        
        array(
            'default'    => false,
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'tweets', 
        
        array(
            'settings' => 'reza_modules[tweets]',
            'label'    => __('Enable the Tweets module.', 'twentysixteen'),
            'section'  => 'reza_modules',
            'type'     => 'checkbox',
            'priority' => 11,
        )
    );
    $wp_customize->add_setting( 
        'reza_modules[tweets_username]', 
        
        array(
            'default'    => __( '', 'twentysixteen' ),
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );
    $wp_customize->add_control(
        'tweets_username', 
        
        array(
            'label'      => __( 'Twitter Username', 'twentysixteen' ),
            'section'    => 'reza_modules',
            'settings'   => 'reza_modules[tweets_username]',
            'priority'   => 12,
        )
    );
    $wp_customize->add_setting( 
        'reza_modules[tweets_api_key]', 
        
        array(
            'default'    => __( '', 'twentysixteen' ),
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );
    $wp_customize->add_control(
        'tweets_api_key', 
        
        array(
            'label'      => __( 'Twitter API Key', 'twentysixteen' ),
            'section'    => 'reza_modules',
            'settings'   => 'reza_modules[tweets_api_key]',
            'priority'   => 14,
        )
    );
    $wp_customize->add_setting( 
        'reza_modules[tweets_api_secret]', 
        
        array(
            'default'    => __( '', 'twentysixteen' ),
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );
    $wp_customize->add_control(
        'tweets_api_secret', 
        
        array(
            'label'      => __( 'Twitter API Secret', 'twentysixteen' ),
            'section'    => 'reza_modules',
            'settings'   => 'reza_modules[tweets_api_secret]',
            'priority'   => 15,
        )
    );
    $wp_customize->add_setting( 
        'reza_modules[tweets_access_token]', 
        
        array(
            'default'    => __( '', 'twentysixteen' ),
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );
    $wp_customize->add_control(
        'tweets_access_token', 
        
        array(
            'label'      => __( 'Twitter Access Token', 'twentysixteen' ),
            'section'    => 'reza_modules',
            'settings'   => 'reza_modules[tweets_access_token]',
            'priority'   => 16,
        )
    );
    $wp_customize->add_setting( 
        'reza_modules[tweets_access_token_secret]', 
        
        array(
            'default'    => __( '', 'twentysixteen' ),
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ) 
    );
    $wp_customize->add_control(
        'tweets_access_token_secret', 
        
        array(
            'label'      => __( 'Twitter Access Token Secret', 'twentysixteen' ),
            'section'    => 'reza_modules',
            'settings'   => 'reza_modules[tweets_access_token_secret]',
            'priority'   => 17,
        )
    );
    /* social icons */
    $wp_customize->add_section(
        'reza_social',

        array(
            'title'    => __( 'Social', 'twentysixteen' ),
            'priority' => 137,
            'panel'    => 'social',
        )
    );
    // facebook
    $wp_customize->add_setting( 
        'reza_social[facebook]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'facebook', 
        
        array(
            'label'      => __('Facebook', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[facebook]',
            'priority'   => 10,
    ));
    // twitter
    $wp_customize->add_setting( 
        'reza_social[twitter]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'twitter', 
        
        array(
            'label'      => __('Twitter', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[twitter]',
            'priority'   => 11,
    ));
    // gplus
    $wp_customize->add_setting( 
        'reza_social[gplus]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'gplus', 
        
        array(
            'label'      => __('Google+', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[gplus]',
            'priority'   => 12,
    ));
    // linkedin
    $wp_customize->add_setting( 
        'reza_social[linkedin]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'linkedin', 
        
        array(
            'label'      => __('LinkedIn', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[linkedin]',
            'priority'   => 13,
    ));
    // instagram
    $wp_customize->add_setting( 
        'reza_social[instagram]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'instagram', 
        
        array(
            'label'      => __('Instagram', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[instagram]',
            'priority'   => 14,
    ));
    // pinterest
    $wp_customize->add_setting( 
        'reza_social[pinterest]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'pinterest', 
        
        array(
            'label'      => __('Pinterest', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[pinterest]',
            'priority'   => 15,
    ));
    // youtube
    $wp_customize->add_setting( 
        'reza_social[youtube]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'youtube', 
        
        array(
            'label'      => __('Youtube', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[youtube]',
            'priority'   => 16,
    ));
    // vimeo
    $wp_customize->add_setting( 
        'reza_social[vimeo]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'vimeo', 
        
        array(
            'label'      => __('Vimeo', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[vimeo]',
            'priority'   => 17,
    ));
    // skype
    $wp_customize->add_setting( 
        'reza_social[skype]', 
        
        array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'edit_theme_options',
            'transport'  => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ) 
    );
    $wp_customize->add_control(
        'skype', 
        
        array(
            'label'      => __('Skype', 'twentysixteen'),
            'section'    => 'reza_social',
            'settings'   => 'reza_social[skype]',
            'priority'   => 18,
    ));
    
    
    
    /************************************************
     ******************* live js ********************
     ************************************************/
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // preview js
    function reza_customize_preview()
    {
        ?>
        <script type="text/javascript">
            (function($)
            {
                
                // styling color
                wp.customize( 'reza_styling[accent_color]', function( value ) {
                    value.bind( function( newval ) {
                        $( '.accent, #articles a, #page a, .post h2 a:hover, #related-posts li h6 a:hover, aside a, #twitter ul li a' ).css( 'color', newval );
                    });
                });
                
                 // styling background
                wp.customize( 'reza_styling[accent_color]', function( value ) {
                    value.bind( function( newval ) {
                        $( '.button, a.button, button' ).css('background', newval );
                    });
                });

                // site title
                wp.customize( 'blogname', function( value ) {
                    value.bind( function( newval ) {
                        $( '#site-logo h1' ).html( newval );
                    });
                });
                
                // site description
                wp.customize( 'blogdescription', function( value ) {
                    value.bind( function( newval ) {
                        $( 'p.desc' ).html( newval );
                    });
                });

            })( jQuery )
        </script>
        <?php
    }

    // load only in preview and not frontend
    if ( $wp_customize->is_preview() && ! is_admin() )
    {
        add_action( 'wp_footer', 'reza_customize_preview', 21);
    }
}

// load Shameem's css into wp_head
function reza_css()
{
    $styling = get_option( 'reza_styling' );
?>
<!-- Shameem's css -->
<style type="text/css">
	progress
	{
		color: <?php echo $styling['accent_color']; ?>;
	}
	
	progress::-webkit-progress-value
	{
		background-color: <?php echo $styling['accent_color']; ?>;
	}
	
	progress::-moz-progress-bar
	{
		background-color: <?php echo $styling['accent_color']; ?>;
	}
	
	.progress-bar 
	{
		background-color: <?php echo $styling['accent_color']; ?>;
	}
	
	.accent,
    #articles a,
    #page a,
    aside a
    {
        color: <?php echo $styling['accent_color']; ?>;
    }
    
    .post h2 a:hover,
    #related-posts li h6 a:hover,
    #twitter ul li a
    {
        color: <?php echo $styling['accent_color']; ?>!important;
    }

    button,
    .button,
    a.button,
	input[type="reset"],
	input[type="submit"],
	input[type="button"], 
    #site-logo p.desc:after,
    .tagcloud a,
    ul#comments .reply a,
    .pagination a:hover
    {
        background: <?php echo $styling['accent_color']; ?>;
    }
</style>
<!-- Shameem's css -->
<?php
}
add_action( 'wp_head', 'reza_css', 21);