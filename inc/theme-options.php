<?php

//Register Settings Page.
function add_appearance_menu() {
     add_submenu_page( 'themes.php', 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'bootstrap_bob_theme_options'); 
}
add_action('admin_menu', 'add_appearance_menu');

/**
 * Register content-home.php settings.
 */

function bootstrap_bob_settings_init(  ) { 

	register_setting( 'theme_options', 'bootstrap_bob_settings' );

	add_settings_section(
		'bootstrap_bob_homepage_section', 
		__( 'Homepage Options', 'bootstrap_bob' ), 
		'bootstrap_bob_settings_section_callback', 
		'theme_options'
	);

	add_settings_field( 
		'bootstrap_bob_text_field_0', 
		__( 'Homepage Title', 'bootstrap_bob' ), 
		'bootstrap_bob_text_field_0_render', 
		'theme_options', 
		'bootstrap_bob_homepage_section' 
	);

	add_settings_field( 
		'bootstrap_bob_text_field_1', 
		__( 'Homepage Sub-title', 'bootstrap_bob' ), 
		'bootstrap_bob_text_field_1_render', 
		'theme_options', 
		'bootstrap_bob_homepage_section' 
	);

	add_settings_field( 
		'bootstrap_bob_text_field_2', 
		__( 'Homepage CTA Button', 'bootstrap_bob' ), 
		'bootstrap_bob_text_field_2_render', 
		'theme_options', 
		'bootstrap_bob_homepage_section' 
	);

	add_settings_field( 
		'bootstrap_bob_upload_field_1', 
		__( 'Homepage Background Image', 'bootstrap_bob' ), 
		'bootstrap_bob_upload_field_1_render', 
		'theme_options', 
		'bootstrap_bob_homepage_section' 
	);

	/**
 * Register content-services.php settings.
 */
	add_settings_section(
		'bootstrap_bob_services_section', 
		__( 'Services Section Options', 'bootstrap_bob' ), 
		'bootstrap_bob_settings_section_callback', 
		'services_options'
	);

	add_settings_field( 
		'bootstrap_bob_services_icon', 
		__( 'Services Icon', 'bootstrap_bob' ), 
		'bootstrap_bob_services_icon_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_title', 
		__( 'Services Title', 'bootstrap_bob' ), 
		'bootstrap_bob_services_title_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_content', 
		__( 'Services Content Area', 'bootstrap_bob' ), 
		'bootstrap_bob__services_content_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

}

function bootstrap_bob_text_field_0_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_text_field_0]' value='<?php if( !empty( $options[ 'bootstrap_bob_text_field_0' ] ) ) echo $options['bootstrap_bob_text_field_0']; ?>'>
	<?php

}

function bootstrap_bob_text_field_1_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_text_field_1]' value='<?php if( !empty( $options[ 'bootstrap_bob_text_field_1' ] ) ) echo $options['bootstrap_bob_text_field_1']; ?>'>
	<?php

}

function bootstrap_bob_text_field_2_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_text_field_2]' value='<?php if( !empty( $options[ 'bootstrap_bob_text_field_2' ] ) ) echo $options['bootstrap_bob_text_field_2']; ?>'>
	<?php

}

function bootstrap_bob_upload_field_1_render() {

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input id="upload_image" type="text" size="36" name="bootstrap_bob_settings[bootstrap_bob_upload_field_1]" value="<?php if( !empty( $options[ 'bootstrap_bob_upload_field_1' ] ) ) echo $options['bootstrap_bob_upload_field_1']; ?>" />
    <input id="upload_image_button" class="button" type="button" value="Upload Image" />
	<?php
}

//services renders
function bootstrap_bob_services_icon_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_icon]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_icon' ] ) ) echo $options['bootstrap_bob_services_icon']; ?>'>
	<?php

}

function bootstrap_bob_services_title_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_title]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_title' ] ) ) echo $options[ 'bootstrap_bob_services_title' ]; ?>'>
	<?php

}

function bootstrap_bob__services_content_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<textarea cols="60" rows="10" name='bootstrap_bob_settings[bootstrap_bob_services_content]'><?php if( !empty( $options[ 'bootstrap_bob_services_content' ] ) ) echo $options['bootstrap_bob_services_content']; ?></textarea>
	<?php

}	
add_action( 'admin_init', 'bootstrap_bob_settings_init' );

/**
 * Render settings on theme options page.
 */
function bootstrap_bob_theme_options() {
	?>
	<form action='options.php' method='post'>
		
		<h2>Bootstrap Bob</h2>
		
		<?php
		settings_fields( 'theme_options' );
		do_settings_sections( 'theme_options' );
		do_settings_sections( 'services_options' );
		submit_button();
		?>
		
	</form>
	<?php
}
//Homepage Section Callback
function bootstrap_bob_settings_section_callback(  ) { 

	echo __( 'This section controls the above the fold area on the homepage.', 'bootstrap_bob' );

}
// Services Section Callback
function bootstrap_bob_services_section_callback(  ) { 

	echo __( 'This the content in the Services Section.', 'bootstrap_bob' );

}

//output background image styles
function bootstrap_bob_hook_css() {
	$options = get_option( 'bootstrap_bob_settings' );

	$output="<style> header { background-image: url(" . $options[ 'bootstrap_bob_upload_field_1' ] . "); 
	background-position: center center;
    background-repeat: none;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    background-attachment: scroll; } </style>";
    echo $output;
}
add_action( 'wp_head', 'bootstrap_bob_hook_css' );

