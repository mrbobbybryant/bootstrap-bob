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
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
