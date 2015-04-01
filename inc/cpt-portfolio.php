<?php
/**
 * Register Portfolio Post Type
 */
function bootstrap_bob_post_type() {
	
	$singular = 'Portfolio';
	$plural = 'Portfolio';

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
	        'menu_icon'           => 'dashicons-format-image',
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

add_action( 'init', 'bootstrap_bob_post_type' );

/**
 * Adds a meta box to the portfolio
 */
function bootsrap_bob_portfolio_metabox() {
    add_meta_box(
      'bootstrap_bob_portfolio',
      __( 'Portfolio Link', 'bootstrap_bob' ),
      'bootstrap_bob_meta_callback',
      'portfolio'
    );
}
add_action( 'add_meta_boxes', 'bootsrap_bob_portfolio_metabox' );

/**
 * Portfolio Meta Box Callback
 */
function bootstrap_bob_meta_callback($post) {
	wp_nonce_field( basename( __FILE__ ), 'bootstrap_bob_nonce' );
    $portfolio_stored_meta = get_post_meta( $post->ID );
    ?>
    <div>
      <div class="meta-row">
          <div class="meta-th">
            <label for="portfolio-url" class="hrm-row-title"><?php _e( 'Portfolio URL', 'bootstrap_bob' )?></label>
          </div>
          <div class="meta-td">
            <input type="text" name="portfolio-url" id="portfolio-url" value="<?php if ( !empty ( $portfolio_stored_meta['portfolio-url'] ) ) echo esc_url( $portfolio_stored_meta['portfolio-url'][0] ); ?>" />
          </div>
      </div>
    </div>
   <?php
}

/**
 * Saves the portfolio custom meta input
 */
function bootstrap_bob_meta_save( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'bootstrap_bob_nonce' ] ) && wp_verify_nonce( $_POST[ 'bootstrap_bob_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'portfolio-url' ] ) ) {
        update_post_meta( $post_id, 'portfolio-url', sanitize_text_field( $_POST[ 'portfolio-url' ] ) );
    }
}
add_action( 'save_post', 'bootstrap_bob_meta_save' );