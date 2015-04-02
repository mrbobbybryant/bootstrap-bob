<?php
/**
 * Bootstrap Bob functions and definitions
 *
 * @package Bootstrap Bob
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bootstrap_bob_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootstrap_bob_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bootstrap Bob, use a find and replace
	 * to change 'bootstrap_bob' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootstrap_bob', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('staff', 225, 225, false );
	add_image_size('portfolio', 600, 450, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bootstrap_bob' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bootstrap_bob_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bootstrap_bob_setup
add_action( 'after_setup_theme', 'bootstrap_bob_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bootstrap_bob_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bootstrap_bob' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bootstrap_bob_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootstrap_bob_scripts() {
	
	wp_enqueue_script( 'bootstrap_bob-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'bootstrap_bob-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'classie-js', get_template_directory_uri() . '/js/classie.js', array(), '', true );
	wp_enqueue_script( 'bootstrap_bob-nav', get_template_directory_uri() . '/js/bootstrap-bob-nav.js', array('classie-js'), '20150401', true );


	//Enqueue Bootstrap Scripts and Styles
	wp_enqueue_style ( 'bootstrap-core', get_template_directory_uri() . '/css/bootstrap.css', '3.3.4' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '3.3.4', true );

	// Enqueue icons and fonts
	wp_enqueue_style ( 'font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), '4.3.0' );
	wp_enqueue_style ( 'font-montserrat', 'http://fonts.googleapis.com/css?family=Montserrat:400,700', array(), '20150331' );
	wp_enqueue_style ( 'font-kaushan', 'http://fonts.googleapis.com/css?family=Kaushan+Script', array(), '20150331' );
	wp_enqueue_style ( 'font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic', array(), '20150331' );
	wp_enqueue_style ( 'font-Roboto', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700', array(), '20150331' );

	wp_enqueue_style( 'bootstrap_bob-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootstrap_bob_scripts' );

function bootstrap_bob_admin_scripts() {

	wp_enqueue_script( 'bootstrap-bob-js', get_template_directory_uri() . '/js/bootstrap-bob.js', array( 'jquery' ), '20150330', true );
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'bootstrap_bob_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Theme Options.
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load About Custom Post Type.
 */
require get_template_directory() . '/inc/cpt-about.php';

/**
 * Load Portfolio Custom Post Type.
 */
require get_template_directory() . '/inc/cpt-portfolio.php';

/**
 * Create custom portfolio query.
 */
function bootstrap_bob_portfolio(){
	$args = array( 'post_type' => 'portfolio' );
	$folio = new WP_Query( $args );

	return $folio;
}

/**
 * Create custom about section query.
 */
function bootstrap_bob_about(){
	$args = array( 
		'post_type' => 'about',
		'order' => 'ASC'
	)
	;
	$about = new WP_Query( $args );

	return $about;
}

/**
 * Create Custom User Profile fields.
 */
function add_extra_social_links( $user ) {
    ?>
        <h3>New User Profile Links</h3>

        <table class="form-table">
            <tr>
                <th><label for="facebook_profile">Facebook Profile</label></th>
                <td><input type="text" name="facebook_profile" value="<?php if ( !empty( get_the_author_meta( 'facebook_profile', $user->ID ) ) ) echo esc_attr(get_the_author_meta( 'facebook_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="twitter_profile">Twitter Profile</label></th>
                <td><input type="text" name="twitter_profile" value="<?php if ( !empty( get_the_author_meta( 'twitter_profile', $user->ID ) ) ) echo esc_attr(get_the_author_meta( 'twitter_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="google_profile">Google+ Profile</label></th>
                <td><input type="text" name="google_profile" value="<?php if ( !empty( get_the_author_meta( 'google_profile', $user->ID ) ) ) echo esc_attr(get_the_author_meta( 'google_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="linkedin_profile">LinkedIn Profile</label></th>
                <td><input type="text" name="linkedin_profile" value="<?php if ( !empty( get_the_author_meta( 'linkedin_profile', $user->ID ) ) ) echo esc_attr(get_the_author_meta( 'linkedin_profile', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>
        <h3>User Profile Picture</h3>

        <table>
            <tr>
                <th><label for="upload_image">Enter a URL or upload an image.</label></th>
                <td><input id="upload_image" type="text" size="36" name="upload_image" value="<?php if ( !empty( get_the_author_meta( 'upload_image', $user->ID ) ) ) echo esc_attr(get_the_author_meta( 'upload_image', $user->ID )); ?>" /></td>
                <td><input id="upload_image_button" class="button" type="button" value="Upload Image" /></td>
            </tr>
        </table>
        <h3>Job Title</h3>

        <table class="form-table">
            <tr>
                <th><label for="user_title">Job Title</label></th>
                <td><input type="text" name="user_title" value="<?php if ( !empty( get_the_author_meta( 'user_title', $user->ID ) ) ) echo esc_attr(get_the_author_meta( 'user_title', $user->ID )); ?>" class="regular-text" /></td>
            </tr>
        </table>    
    <?php
}
add_action( 'show_user_profile', 'add_extra_social_links' );
add_action( 'edit_user_profile', 'add_extra_social_links' );

/**
 * Save Custom user fields.
 */

function save_extra_social_links( $user_id ) {
    update_user_meta( $user_id,'facebook_profile', sanitize_text_field( $_POST['facebook_profile'] ) );
    update_user_meta( $user_id,'twitter_profile', sanitize_text_field( $_POST['twitter_profile'] ) );
    update_user_meta( $user_id,'google_profile', sanitize_text_field( $_POST['google_profile'] ) );
    update_user_meta( $user_id,'linkedin_profile', sanitize_text_field( $_POST['linkedin_profile'] ) );
    update_user_meta( $user_id,'upload_image', sanitize_text_field( $_POST['upload_image'] ) );
    update_user_meta( $user_id,'user_title', sanitize_text_field( $_POST['user_title'] ) );
}
add_action( 'personal_options_update', 'save_extra_social_links' );
add_action( 'edit_user_profile_update', 'save_extra_social_links' );

function add_menuclass($ulclass) {
return preg_replace('/<a rel="page-scroll"/', '<a rel="nofollow" class="page-scroll"', $ulclass, 1);
}
add_filter('wp_nav_menu','add_menuclass');



