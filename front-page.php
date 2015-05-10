<?php

get_header();

get_template_part( 'content', 'home' );

if( get_theme_mod( 'display_services_section' ) == 1) {

	get_template_part( 'content', 'services' );

}

if( get_theme_mod( 'display_portfolio_section' ) == 1) {

	get_template_part( 'content', 'portfolio' );

}
 

get_template_part( 'content', 'about' );

get_template_part( 'content', 'staff' );

get_template_part( 'content', 'clients' );

get_template_part( 'content', 'contact' );

get_template_part( 'content', 'modal' );

?>



<?php

get_footer();