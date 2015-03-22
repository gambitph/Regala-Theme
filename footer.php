<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package regala
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>
		<div class="site-info-container">
			<div class="site-info">
				<?php
					if ( class_exists( 'TitanFramework' ) ) {
						$titan = TitanFramework::getInstance( 'regala' );
						echo $titan->getOption( 'footer_copyright_text' );
					}
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
