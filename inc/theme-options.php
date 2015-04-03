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
		'bootstrap_bob_services_icon_1', 
		__( 'Services Icon One', 'bootstrap_bob' ), 
		'bootstrap_bob_services_icon_1_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_title_1', 
		__( 'Services Title One', 'bootstrap_bob' ), 
		'bootstrap_bob_services_title_1_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_content_1', 
		__( 'Services Content Area One', 'bootstrap_bob' ), 
		'bootstrap_bob__services_content_1_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);
	add_settings_field( 
		'bootstrap_bob_services_icon_2', 
		__( 'Services Icon Two', 'bootstrap_bob' ), 
		'bootstrap_bob_services_icon_2_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_title_2', 
		__( 'Services Title Two', 'bootstrap_bob' ), 
		'bootstrap_bob_services_title_2_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_content_2', 
		__( 'Services Content Area Two', 'bootstrap_bob' ), 
		'bootstrap_bob__services_content_2_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);
	add_settings_field( 
		'bootstrap_bob_services_icon_3', 
		__( 'Services Icon Three', 'bootstrap_bob' ), 
		'bootstrap_bob_services_icon_3_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_title_3', 
		__( 'Services Title Three', 'bootstrap_bob' ), 
		'bootstrap_bob_services_title_3_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

	add_settings_field( 
		'bootstrap_bob_services_content_3', 
		__( 'Services Content Area Three', 'bootstrap_bob' ), 
		'bootstrap_bob__services_content_3_render', 
		'services_options', 
		'bootstrap_bob_services_section' 
	);

}
/**
* Render content-home.php settings.
*/
function bootstrap_bob_text_field_0_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' size="50" name='bootstrap_bob_settings[bootstrap_bob_text_field_0]' value='<?php if( !empty( $options[ 'bootstrap_bob_text_field_0' ] ) ) echo $options['bootstrap_bob_text_field_0']; ?>'>
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

/**
* Render First content-services.php settings.
*/
function bootstrap_bob_services_icon_1_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_icon_1]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_icon_1' ] ) ) echo $options['bootstrap_bob_services_icon_1']; ?>'>
	<?php

}

function bootstrap_bob_services_title_1_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_title_1]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_title_1' ] ) ) echo $options[ 'bootstrap_bob_services_title_1' ]; ?>'>
	<?php

}

function bootstrap_bob__services_content_1_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<textarea cols="60" rows="10" name='bootstrap_bob_settings[bootstrap_bob_services_content_1]'><?php if( !empty( $options[ 'bootstrap_bob_services_content_1' ] ) ) echo $options['bootstrap_bob_services_content_1']; ?></textarea>
	<?php

}
/**
* Render Second content-services.php settings.
*/
function bootstrap_bob_services_icon_2_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_icon_2]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_icon_2' ] ) ) echo $options['bootstrap_bob_services_icon_2']; ?>'>
	<?php

}

function bootstrap_bob_services_title_2_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_title_2]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_title_2' ] ) ) echo $options[ 'bootstrap_bob_services_title_2' ]; ?>'>
	<?php

}

function bootstrap_bob__services_content_2_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<textarea cols="60" rows="10" name='bootstrap_bob_settings[bootstrap_bob_services_content_2]'><?php if( !empty( $options[ 'bootstrap_bob_services_content_2' ] ) ) echo $options['bootstrap_bob_services_content_2']; ?></textarea>
	<?php

}
/**
* Render Third content-services.php settings.
*/
function bootstrap_bob_services_icon_3_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_icon_3]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_icon_3' ] ) ) echo $options['bootstrap_bob_services_icon_3']; ?>'>
	<?php

}

function bootstrap_bob_services_title_3_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<input type='text' name='bootstrap_bob_settings[bootstrap_bob_services_title_3]' value='<?php if( !empty( $options[ 'bootstrap_bob_services_title_3' ] ) ) echo $options[ 'bootstrap_bob_services_title_3' ]; ?>'>
	<?php

}

function bootstrap_bob__services_content_3_render(  ) { 

	$options = get_option( 'bootstrap_bob_settings' );
	?>
	<textarea cols="60" rows="10" name='bootstrap_bob_settings[bootstrap_bob_services_content_3]'><?php if( !empty( $options[ 'bootstrap_bob_services_content_3' ] ) ) echo $options['bootstrap_bob_services_content_3']; ?></textarea>
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
		settings_fields( 'social_options' );
		do_settings_sections( 'social_options' );
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


function bootstrap_bob_social_settings_init(  ) { 

	register_setting( 'social_options', 'bootstrap_bob_social' );

	add_settings_section(
		'bootstrap_bob_social_section', 
		__( 'Social Media Options', 'bootstrap_bob' ), 
		'bootstrap_bob_social_section_callback', 
		'social_options'
	);

	add_settings_field( 
		'bootstrap_bob_facebook', 
		__( 'Facebook Url', 'bootstrap_bob' ), 
		'bootstrap_bob_facebook_render', 
		'social_options', 
		'bootstrap_bob_social_section' 
	);

	add_settings_field( 
		'bootstrap_bob_twitter', 
		__( 'Twiiter Url', 'bootstrap_bob' ), 
		'bootstrap_bob_twitter_render', 
		'social_options', 
		'bootstrap_bob_social_section' 
	);

	add_settings_field( 
		'bootstrap_bob_linkedin', 
		__( 'LinkedIn Url', 'bootstrap_bob' ), 
		'bootstrap_bob_linkedin_render', 
		'social_options', 
		'bootstrap_bob_social_section' 
	);

	add_settings_field( 
		'bootstrap_bob_google', 
		__( 'Google Plus Url', 'bootstrap_bob' ), 
		'bootstrap_bob_google_render', 
		'social_options', 
		'bootstrap_bob_social_section' 
	);
	add_settings_field( 
		'bootstrap_bob_youtube', 
		__( 'YouTube Url', 'bootstrap_bob' ), 
		'bootstrap_bob_youtube_render', 
		'social_options', 
		'bootstrap_bob_social_section' 
	);
}
function bootstrap_bob_facebook_render(  ) { 

	$options = get_option( 'bootstrap_bob_social' );
	?>
	<input type='text' name='bootstrap_bob_social[bootstrap_bob_facebook]' value='<?php if( !empty( $options[ 'bootstrap_bob_facebook' ] ) ) echo $options[ 'bootstrap_bob_facebook' ]; ?>'>
	<?php

}
function bootstrap_bob_twitter_render(  ) { 

	$options = get_option( 'bootstrap_bob_social' );
	?>
	<input type='text' name='bootstrap_bob_social[bootstrap_bob_twitter]' value='<?php if( !empty( $options[ 'bootstrap_bob_twitter' ] ) ) echo $options[ 'bootstrap_bob_twitter' ]; ?>'>
	<?php

}
function bootstrap_bob_linkedin_render(  ) { 

	$options = get_option( 'bootstrap_bob_social' );
	?>
	<input type='text' name='bootstrap_bob_social[bootstrap_bob_linkedin]' value='<?php if( !empty( $options[ 'bootstrap_bob_linkedin' ] ) ) echo $options[ 'bootstrap_bob_linkedin' ]; ?>'>
	<?php

}
function bootstrap_bob_google_render(  ) { 

	$options = get_option( 'bootstrap_bob_social' );
	?>
	<input type='text' name='bootstrap_bob_social[bootstrap_bob_google]' value='<?php if( !empty( $options[ 'bootstrap_bob_google' ] ) ) echo $options[ 'bootstrap_bob_google' ]; ?>'>
	<?php

}
function bootstrap_bob_youtube_render(  ) { 

	$options = get_option( 'bootstrap_bob_social' );
	?>
	<input type='text' name='bootstrap_bob_social[bootstrap_bob_youtube]' value='<?php if( !empty( $options[ 'bootstrap_bob_youtube' ] ) ) echo $options[ 'bootstrap_bob_youtube' ]; ?>'>
	<?php

}
add_action( 'admin_init', 'bootstrap_bob_social_settings_init' );

function bootstrap_bob_social_section_callback() {
	echo __( 'This section controls which social Icons appear in the footer.', 'bootstrap_bob' );
}