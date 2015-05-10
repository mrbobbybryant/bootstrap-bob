<?php

/**
 * This function adds a section the the Homepage Hero Panel. It also calls all the settings function,
 * for this section.
 */
function _bootstrap_bob_portfolio_sections( $wp_customize ) {
	$wp_customize->add_section(
        'portfolio_section_one',
        array(
            'title' => __( 'Portfolio Section', 'bootstrap_bob' ),
            'description' => __( 'This is the main settings area for the Homepage Portfolio Section.', 'bootstrap_bob' ),
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'panel' => 'homepage_portfolio_section_panel'
        )
    );

	_bootstrap_bob_portfolio_toggle( $wp_customize );
	
}

function _bootstrap_bob_portfolio_toggle( $wp_customize ) {
	$wp_customize->add_setting(
    'display_portfolio_section', array(
	   		'default' => 1,
	        'type' => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'sanitize_callback' => 'bootstrap_bob_sanitize_checkbox'
	    )
	);
	$wp_customize->add_control(
    'display_portfolio_section', array(
	        'type' => 'checkbox',
	        'label' => __( 'Display Portfolio Section', 'bootstrap_bob' ),
	        'section' => 'portfolio_section_one',
	        'setting' => 'display_portfolio_section'
	    )
	);
}