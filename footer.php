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
					if ( class_exists( 'TitanFramework' ) && class_exists( 'GambitRegalaPro' ) ) {
						$titan = TitanFramework::getInstance( 'regala' );
						echo esc_attr( $titan->getOption( 'footer_copyright_text' ) );
					} else {
						?>
						<a href="http://wordpress.org/" rel="generator">Proudly powered by WordPress</a>
						<?php
						printf( __( 'Theme: %1$s by %2$s.', 'regala' ), 'Regala', '<a href="http://gambit.ph/" rel="designer">Gambit</a>' );
					}
				?>
				<span class="social-navigation"><?php regala_create_social_icons() ?></span>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
