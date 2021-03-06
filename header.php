<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Bootstrap Bob
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<title><?php bloginfo( 'description' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class("index"); ?> id="page-top">
	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php 
          // Fix menu overlap bug..
          if ( is_admin_bar_showing() ) echo '<div style="min-height: 28px;"></div>'; 
        ?>
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php echo __('Toggle navigation'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><?php bloginfo('name') ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'bs-example-navbar-collapse-1',
                'menu_class' => 'nav navbar-nav navbar-right',
                'menu_id' => 'primary-menu'
                ) ); 
            ?>
        </div>
        <!-- /.container-fluid -->
    </nav>
