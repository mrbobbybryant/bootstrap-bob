<?php
/**
 * Bootstrap Bob Theme Customizer
 *
 * @package Bootstrap Bob
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bootstrap_bob_customize_remove( $wp_customize ) {
	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}
add_action( 'customize_register', 'bootstrap_bob_customize_remove' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bootstrap_bob_customize_preview_js( $wp_customize ) {
	wp_enqueue_script( 'bootstrap_bob_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bootstrap_bob_customize_preview_js' );

function bootstrap_bob_customizer_panels( $wp_customize ) {
	$wp_customize->add_panel(
    	'homepage_hero_section_panel',
    	array(
    		'priority' =>10,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => __( 'Homepage Hero Panel.', 'bootstrap_bob' ),
    		'description' => __( 'These settings control the look and feel of the top section on the homepage.', 'bootstrap_bob' )
    	)
    );

    _bootstrap_bob_hero_sections( $wp_customize );

}
add_action( 'customize_register', 'bootstrap_bob_customizer_panels' );

function _bootstrap_bob_hero_sections( $wp_customize ) {
	$wp_customize->add_section(
        'hero_section_one',
        array(
            'title' => __( 'Hero Section', 'bootstrap_bob' ),
            'description' => __( 'This is the main setings area for the Homepage Hero section.', 'bootstrap_bob' ),
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'panel' => 'homepage_hero_section_panel'
        )
    );

	_bootstrap_bob_homepage_hero_settings( $wp_customize );

    $wp_customize->add_section(
        'hero_section_two',
        array(
            'title' => __('Hero Section Colors', 'bootstrap_bob'),
            'description' => __('This section controls the hero section colors.', 'bootstrap_bob'),
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'panel' => 'homepage_hero_section_panel'
        )
    );

    _bootstrap_bob_homepage_hero_colors( $wp_customize );
}
function _bootstrap_bob_homepage_hero_settings( $wp_customize ) {
	$wp_customize->add_setting( 
		'hero_image_upload', 
		array(
			'capability' => 'edit_theme_options',
		) 
	);
 
	$wp_customize->add_control(
	    new WP_Customize_Upload_Control(
	        $wp_customize,
	        'hero_image_upload',
	        array(
	            'label' => __('Hero Image Upload', 'bootstrap_bob'),
	            'section' => 'hero_section_one',
	            'settings' => 'hero_image_upload'
	        )
	    )
	);
	$wp_customize->add_setting(
	    'hero_title_one_textbox',
	    array(
	        'default' => __('Welcome To Our Studio!', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'boobtstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'hero_title_one_textbox',
	    array(
	        'label' => __('Welcome Title', 'bootstrap_bob'),
	        'section' => 'hero_section_one',
	        'type' => 'text',
	        'setting' => 'hero_title_one_textbox',
	    )
	);
	// NEEDS WORK!!!!!!!!
	$wp_customize->add_setting( 
		'font_range_field_1', 
		array(
			'default' => 22,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'font_range_field_1', 
		array(
		    'type' => 'range',
		    'setting' => 'font_range_field_1',
		    'section' => 'hero_section_one',
		    'label' => __( 'Welcome Title Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 0,
		        'max' => 50,
		        'step' => 1,
	    	),
		) 
	);
	$wp_customize->add_setting(
	    'hero_title_two_textbox',
	    array(
	        'default' => __('IT IS NICE TO MEET YOU', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'boobtstrap_bob_sanitize_text'
	    )
	);
	$wp_customize->add_control(
	    'hero_title_two_textbox',
	    array(
	        'label' => __('Greeting Title', 'bootstrap_bob'),
	        'section' => 'hero_section_one',
	        'type' => 'text',
	        'setting' => 'hero_title_two_textbox',
	    )
	);
	$wp_customize->add_setting(
	    'hero_button_textbox',
	    array(
	        'default' => __('Tell Me More', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'boobtstrap_bob_sanitize_text'
	    )
	);
	$wp_customize->add_control(
	    'hero_button_textbox',
	    array(
	        'label' => __('Hero Button Text', 'bootstrap_bob'),
	        'section' => 'hero_section_one',
	        'type' => 'text',
	        'setting' => 'hero_button_textbox',
	    )
	);
}

function _bootstrap_bob_homepage_hero_colors( $wp_customize ) {
	$wp_customize->add_setting(
    	'hero_font_color_setting', array(
    		'default' => '#fff',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'hero_font_color_setting',
    		array(
    			'label' => __( 'Hero Title Font Color', 'bootstrap_bob' ),
    			'section' => 'hero_section_two',
    			'setting' => 'hero_font_color_setting'
    		)
    	)
    );
    $wp_customize->add_setting(
    	'hero_button_color_setting', array(
    		'default' => '#fed136',
    		// 'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'hero_button_color_setting',
    		array(
    			'label' => __( 'Hero Button Color', 'bootstrap_bob' ),
    			'section' => 'hero_section_two',
    			'setting' => 'hero_button_color_setting'
    		)
    	)
    );
    $wp_customize->add_setting(
    	'hero_button_border_color', array(
    		'default' => '#fed136',
    		// 'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'hero_button_border_color',
    		array(
    			'label' => __( 'Hero Button Border Color', 'bootstrap_bob' ),
    			'section' => 'hero_section_two',
    			'setting' => 'hero_button_border_color'
    		)
    	)
    );
}

/**
 * Applying the above color settings viz wp_head.
 */
function bootstrap_bob_customizer_css()
{
    ?>
         <style type="text/css">
             .intro-lead-in { 
             	/*color:<?php echo get_theme_mod('hero_font_color_setting', '#fff'); ?>;*/
             	font-size:<?php echo get_theme_mod( 'font_range_field_1', 22 ); ?>px;
             }
             .intro-heading { 
             	color:<?php echo get_theme_mod('hero_font_color_setting', '#fff'); ?>;
             }
             .btn-xl {
             	background-color:<?php echo esc_attr( get_theme_mod( 'hero_button_color_setting', '#fed136' ) ); ?>;
             	border-color:<?php echo esc_attr( get_theme_mod( 'hero_button_border_color', '#fed136' ) ); ?>;
             }
         </style>
    <?php
}
add_action( 'wp_head', 'bootstrap_bob_customizer_css');

function boobtstrap_bob_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}





