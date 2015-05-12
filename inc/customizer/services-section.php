<?php

/**
 * This function adds a section the the Homepage Services Panel. It also calls all the settings function,
 * for this section.
 */
function _bootstrap_bob_services_sections( $wp_customize ) {
	$wp_customize->add_section(
        'service_section_one',
        array(
            'title' => __( 'Services Section', 'bootstrap_bob' ),
            'description' => __( 'This is the main setings area for the Homepage Services Section.', 'bootstrap_bob' ),
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'panel' => 'homepage_services_section_panel'
        )
    );

	_bootstrap_bob_services_toggle( $wp_customize );
	_bootstrap_bob_services_title( $wp_customize );
	_bootstrap_bob_services_subtitle( $wp_customize );
	
}
/**
 * This function adds a section the the Homepage Services Panel. It also calls all the settings function,
 * for this section.
 */
function _bootstrap_bob_services_individual_sections( $wp_customize ) {
	$wp_customize->add_section(
        'service_section_two',
        array(
            'title' => __( 'Services Section One', 'bootstrap_bob' ),
            'description' => __( 'This section controls the first services column', 'bootstrap_bob' ),
            'priority' => 36,
            'capability' => 'edit_theme_options',
            'panel' => 'homepage_services_section_panel',
            'active_callback' => 'service_section_callback'
        )
    );

	_bootstrap_bob_service_one( $wp_customize );
	
}

function _bootstrap_bob_services_toggle( $wp_customize ) {
	$wp_customize->add_setting(
    'display_services_section', array(
	   		'default' => 1,
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
    'display_services_section', array(
	        'type' => 'checkbox',
	        'label' => __( 'Display Services Section', 'bootstrap_bob' ),
	        'section' => 'service_section_one',
	        'setting' => 'display_services_section'
	    )
	);
}
//Services Title Controls
function _bootstrap_bob_services_title( $wp_customize ) {
	//Services title Text Input Field
	$wp_customize->add_setting(
	    'services_title_textbox',
	    array(
	        'default' => __('Services', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'services_title_textbox',
	    array(
	        'label' => __('Services Title Text', 'bootstrap_bob'),
	        'section' => 'service_section_one',
	        'type' => 'text',
	        'setting' => 'services_title_textbox',
	        'active_callback' => 'service_section_callback'
	    )
	);
	// Services Title Font Size Controls
	$wp_customize->add_setting( 
		'services_title_font_range', 
		array(
			'default' => 40,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'services_title_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'services_title_font_range',
		    'section' => 'service_section_one',
		    'active_callback' => 'service_section_callback',
		    'label' => __( 'Services Title Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 20,
		        'max' => 80,
		        'step' => 1,
	    	),
		) 
	);
	//Services Title Font Color
	$wp_customize->add_setting(
    	'services_title_font_color', array(
    		'default' => '#333333',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'services_title_font_color',
    		array(
    			'label' => __( 'Services Title Font Color', 'bootstrap_bob' ),
    			'section' => 'service_section_one',
    			'setting' => 'services_title_font_color',
    			'active_callback' => 'service_section_callback'
    		)
    	)
    );
}
//Services Subtitle Controls
function _bootstrap_bob_services_subtitle( $wp_customize ) {
	//Services title Text Input Field
	$wp_customize->add_setting(
	    'services_subtitle_textbox',
	    array(
	        'default' => __('Lorem ipsum dolor sit amet consectetur.', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'services_subtitle_textbox',
	    array(
	        'label' => __('Services Subtitle Text', 'bootstrap_bob'),
	        'section' => 'service_section_one',
	        'type' => 'text',
	        'setting' => 'services_subtitle_textbox',
	        'active_callback' => 'service_section_callback'
	    )
	);
	// Services Title Font Size Controls
	$wp_customize->add_setting( 
		'services_subtitle_font_range', 
		array(
			'default' => 16,
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'intval',
			'transport' => 'postMessage'
		) 
	);

	$wp_customize->add_control( 
		'services_subtitle_font_range', 
		array(
		    'type' => 'range',
		    'setting' => 'services_subtitle_font_range',
		    'section' => 'service_section_one',
		    'active_callback' => 'service_section_callback',
		    'label' => __( 'Services SubTitle Font Size', 'bootstrap_bob' ),
		    'input_attrs' => array(
		        'min' => 8,
		        'max' => 50,
		        'step' => 1,
	    	),
		) 
	);
	//Services Title Font Color
	$wp_customize->add_setting(
    	'services_subtitle_font_color', array(
    		'default' => '#777',
    		'transport' => 'postMessage',
    		'capability' => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_hex_color',

    	)
    );
    $wp_customize->add_control(
    	new WP_Customize_Color_Control(
    		$wp_customize,
    		'services_subtitle_font_color',
    		array(
    			'label' => __( 'Services SubTitle Font Color', 'bootstrap_bob' ),
    			'section' => 'service_section_one',
    			'setting' => 'services_subtitle_font_color',
    			'active_callback' => 'service_section_callback'
    		)
    	)
    );
}
//Services Subtitle Controls
function _bootstrap_bob_service_one( $wp_customize ) {
	//Services title Text Input Field
	$wp_customize->add_setting(
	    'services_one_title_textbox',
	    array(
	        'default' => __('fa-shopping-cart', 'bootstrap_bob'),
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_text',
	        'transport' => 'postMessage',
	    )
	);
	$wp_customize->add_control(
	    'services_one_title_textbox',
	    array(
	        'label' => __('Service One Title', 'bootstrap_bob'),
	        'section' => 'service_section_two',
	        'type' => 'text',
	        'setting' => 'services_one_title_textbox',
	    )
	);
}
/**
 * Show/Hide Active callback function. This function controls whether or not to show the services
 * settings based on whether or not the services section is being used.
 */
function service_section_callback( $control ) {
	if ( $control->manager->get_setting('display_services_section')->value() == '1' ) {
        return true;
    } else {
        return false;
    }
}