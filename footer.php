<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bootstrap Bob
 */
?>
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">
                    	Copyright &copy; <a href="?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
						<?php echo date("Y"); ?>.
					</span>
                </div>
                <div class="col-md-4">
                    <?php wla_dental_social_icons(); ?>
                </div>
                <?php wp_nav_menu( array( 
                'theme_location' => 'footer',
                'container_class' => 'col-md-4',
                'menu_class' => 'list-inline quicklinks'
                ) ); 
            ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
