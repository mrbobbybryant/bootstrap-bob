<?php
/**
 * Register Portfolio Post Type
 */
function bootstrap_bob_about_post_type() {
	
	$singular = 'About';
	$plural = 'About';

	$labels = array(
		'name' 			=> $plural,
		'singular_name' 	=> $singular,
		'add_new' 		=> 'Add New',
		'add_new_item'  	=> 'Add New ' . $singular,
		'edit'		        => 'Edit',
		'edit_item'	        => 'Edit ' . $singular,
		'new_item'	        => 'New ' . $singular,
		'view' 			=> 'View ' . $singular,
		'view_item' 		=> 'View ' . $singular,
		'search_term'   	=> 'Search ' . $plural,
		'parent' 		=> 'Parent ' . $singular,
		'not_found' 		=> 'No ' . $plural .' found',
		'not_found_in_trash' 	=> 'No ' . $plural .' in Trash'
		);

	$args = array(
		'labels'              => $labels,
	        'public'              => true,
	        'publicly_queryable'  => true,
	        'exclude_from_search' => false,
	        'show_in_nav_menus'   => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 10,
	        'menu_icon'           => 'dashicons-editor-ul',
	        'can_export'          => true,
	        'delete_with_user'    => false,
	        'hierarchical'        => false,
	        'has_archive'         => true,
	        'query_var'           => true,
	        'capability_type'     => 'post',
	        'map_meta_cap'        => true,
	        // 'capabilities' => array(),
	        'rewrite'             => array( 
	        	'slug' => $plural,
	        	'with_front' => true,
	        	'pages' => true,
	        	'feeds' => true,

	        ),
	        'supports'            => array( 
	        	'title',
	        	'thumbnail'
	        )
	);
	register_post_type( $singular, $args );
}

add_action( 'init', 'bootstrap_bob_about_post_type' );

/**
 * Adds a meta box to the about cpt
 */
function bootsrap_bob_about_metabox() {
    add_meta_box(
      'bootstrap_bob_about',
      __( 'About Entry', 'bootstrap_bob' ),
      'bootstrap_bob_about_callback',
      'about'
    );
}
add_action( 'add_meta_boxes', 'bootsrap_bob_about_metabox' );

function bootstrap_bob_about_callback() {
	echo 'this is my metabox';
}