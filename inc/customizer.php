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
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->get_setting('blogname')->transport='postMessage';
}
add_action( 'customize_register', 'bootstrap_bob_customize_remove' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bootstrap_bob_customize_preview_js( $wp_customize ) {
	wp_enqueue_script( 'bootstrap_bob_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bootstrap_bob_customize_preview_js' );

/**
 * This function adds additional settings to the default sections.
 */
function bootstrap_bob_customizer_additions( $wp_customize ) {
	// Site Title Font Size Controls
	$wp_customize->add_setting( 
		'site_title_font_range', 
		array(
			'default' => 18,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'site_title_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'site_title_font_range',
		    'section' => 'title_tagline',
		    'label' => __( 'Site Title Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 0,
		        'max' => 50,
		        'step' => 1,
	    	),
		) 
	);
	//Site Title Color Setting
	$wp_customize->add_setting(
    	'site_title_color_setting', array(
    		'default' => '#fed136',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'site_title_color_setting',
    		array(
    			'label' => __( 'Site Title Color', 'bootstrap_bob' ),
    			'section' => 'title_tagline',
    			'setting' => 'site_title_color_setting',
    		)
    	)
    );
    //Navigations Settings
    // Nav Font Size Controls
	$wp_customize->add_setting( 
		'nav_font_range', 
		array(
			'default' => 18,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'nav_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'nav_font_range',
		    'section' => 'nav',
		    'label' => __( 'Navigation Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 0,
		        'max' => 50,
		        'step' => 1,
	    	),
		) 
	);
	//Nav Font Color Setting
	$wp_customize->add_setting(
    	'nav_font_color_setting', array(
    		'default' => '#fff',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'nav_font_color_setting',
    		array(
    			'label' => __( 'Navigation Font Color', 'bootstrap_bob' ),
    			'section' => 'nav',
    			'setting' => 'nav_font_color_setting',
    		)
    	)
    );
    //Nav Mobile Button Color Setting
	$wp_customize->add_setting(
    	'nav_menu_button_color', array(
    		'default' => '#fed136',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'nav_menu_button_color',
    		array(
    			'label' => __( 'Mobile Nav Button Color', 'bootstrap_bob' ),
    			'section' => 'nav',
    			'setting' => 'nav_menu_button_color',
    		)
    	)
    );
    //Nav Mobile Button Icon Setting
	$wp_customize->add_setting(
    	'nav_menu_button_icon_color', array(
    		'default' => '#fed136',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'nav_menu_button_icon_color',
    		array(
    			'label' => __( 'Mobile Nav Button Icon Color', 'bootstrap_bob' ),
    			'section' => 'nav',
    			'setting' => 'nav_menu_button_icon_color',
    		)
    	)
    );
}
add_action( 'customize_register', 'bootstrap_bob_customizer_additions' );

/**
 * This function adds a custom panel for the Homepage Hero Section.
 */
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

	$wp_customize->add_panel(
    	'homepage_services_section_panel',
    	array(
    		'priority' =>11,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => __( 'Homepage Sevices Section.', 'bootstrap_bob' ),
    		'description' => __( 'These settings control the look and feel of the services section on the homepage.', 'bootstrap_bob' )
    	)
    );
    _bootstrap_bob_services_sections( $wp_customize );
    _bootstrap_bob_services_individual_sections( $wp_customize );

    $wp_customize->add_panel(
    	'homepage_portfolio_section_panel',
    	array(
    		'priority' =>11,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => __( 'Homepage Portfolio Section.', 'bootstrap_bob' ),
    		'description' => __( 'These settings control the look and feel of the portfolio section on the homepage.', 'bootstrap_bob' )
    	)
    );
    _bootstrap_bob_portfolio_sections( $wp_customize );

}
add_action( 'customize_register', 'bootstrap_bob_customizer_panels' );

/**
 * This function adds a section the the Homepage Hero Panel. It also calls all the settings function,
 * for this section.
 */
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

	_bootstrap_bob_homepage_hero_title_1( $wp_customize );
	_bootstrap_bob_homepage_hero_title_2( $wp_customize );
	_bootstrap_bob_homepage_hero_button( $wp_customize );
}

/**
 * This function controls all the settings and contols for the hero section title.
 */
function _bootstrap_bob_homepage_hero_title_1( $wp_customize ) {
	// Hero Image Uplaod
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
	//Welcome Title Settings
	//Input Field
	$wp_customize->add_setting(
	    'welcome_title_textbox',
	    array(
	        'default' => __('Welcome To Our Studio!', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'welcome_title_textbox',
	    array(
	        'label' => __('Welcome Title', 'bootstrap_bob'),
	        'section' => 'hero_section_one',
	        'type' => 'text',
	        'setting' => 'welcome_title_textbox',
	    )
	);
	// Welcome Title Font Size Controls
	$wp_customize->add_setting( 
		'welcome_title_font_range', 
		array(
			'default' => 22,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'welcome_title_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'welcome_title_font_range',
		    'section' => 'hero_section_one',
		    'label' => __( 'Welcome Title Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 0,
		        'max' => 50,
		        'step' => 1,
	    	),
		) 
	);
	//Welcome Title Color Setting
	$wp_customize->add_setting(
    	'welcome_title_color_setting', array(
    		'default' => '#fff',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'welcome_title_color_setting',
    		array(
    			'label' => __( 'Hero Title Font Color', 'bootstrap_bob' ),
    			'section' => 'hero_section_one',
    			'setting' => 'welcome_title_color_setting',
    		)
    	)
    );
}
/**
 * This function controls all the settings and contols for the hero section subtitle.
 */
function _bootstrap_bob_homepage_hero_title_2( $wp_customize ) {
	//Subtitle Input Field
	$wp_customize->add_setting(
	    'hero_subtitle_textbox',
	    array(
	        'default' => __('IT IS NICE TO MEET YOU', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'hero_subtitle_textbox',
	    array(
	        'label' => __('Subtitle', 'bootstrap_bob'),
	        'section' => 'hero_section_one',
	        'type' => 'text',
	        'setting' => 'hero_subtitle_textbox',
	    )
	);
	// Subtitle Font Size Controls
	$wp_customize->add_setting( 
		'hero_subtitle_font_range', 
		array(
			'default' => 50,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'hero_subtitle_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'hero_subtitle_font_range',
		    'section' => 'hero_section_one',
		    'label' => __( 'Subtitle Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 0,
		        'max' => 100,
		        'step' => 1,
	    	),
		) 
	);
	//Subtitle Color Setting
	$wp_customize->add_setting(
    	'subtitle_color_setting', array(
    		'default' => '#fff',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'subtitle_color_setting',
    		array(
    			'label' => __( 'Subtitle Font Color', 'bootstrap_bob' ),
    			'section' => 'hero_section_one',
    			'setting' => 'subtitle_color_setting',
    		)
    	)
    );
}
/**
 * This function controls all the settings and contols for the hero section button.
 */
function _bootstrap_bob_homepage_hero_button( $wp_customize ) {
    //Hero Button Text Input Field
	$wp_customize->add_setting(
	    'hero_button_textbox',
	    array(
	        'default' => __('Tell Me More', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'hero_button_textbox',
	    array(
	        'label' => __('Button Text', 'bootstrap_bob'),
	        'section' => 'hero_section_one',
	        'type' => 'text',
	        'setting' => 'hero_button_textbox',
	    )
	);
	// Hero Button Font Size Controls
	$wp_customize->add_setting( 
		'hero_button_font_range', 
		array(
			'default' => 18,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'hero_button_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'hero_button_font_range',
		    'section' => 'hero_section_one',
		    'label' => __( 'Hero Button Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 0,
		        'max' => 40,
		        'step' => 1,
	    	),
		) 
	);
	//Hero Button Font Color
	$wp_customize->add_setting(
    	'hero_button_font_color', array(
    		'default' => '#fff',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'hero_button_font_color',
    		array(
    			'label' => __( 'Hero Button Font Color', 'bootstrap_bob' ),
    			'section' => 'hero_section_one',
    			'setting' => 'hero_button_font_color'
    		)
    	)
    );
    //Hero Button Color
    $wp_customize->add_setting(
    	'hero_button_color_setting', array(
    		'default' => '#fed136',
    		'transport' => 'postMessage',
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
    			'section' => 'hero_section_one',
    			'setting' => 'hero_button_color_setting'
    		)
    	)
    );
    //Hero Button Border Color
    $wp_customize->add_setting(
    	'hero_button_border_color', array(
    		'default' => '#fed136',
    		'transport' => 'postMessage',
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
    			'section' => 'hero_section_one',
    			'setting' => 'hero_button_border_color'
    		)
    	)
    );
}

/**
 * The next set of functions are responsible for custom sanitization callbacks.
 */
function bootstrap_bob_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function bootstrap_bob_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Load Services Section Customizer Settings.
 */
require get_template_directory() . '/inc/customizer/services-section.php';

/**
 * Load Portfolio Section Customizer Settings.
 */
require get_template_directory() . '/inc/customizer/portfolio-section.php';


