<?php
/**
 * @package theme1
 */
 
$articleStyle = "";

if ( has_post_thumbnail() ) {
    
    $imageAttributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); // returns an array
    
    if ( $imageAttributes ) {
        $articleStyle = 'style="background-image: url( ' . $imageAttributes[0] . ' )"';
    }
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo $articleStyle; ?>>
    <div class='index-box'>
        
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php theme1_posted_on(); ?>
			<?php 
                if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
                    echo '<span class="comments-link">';
                    comments_popup_link( __( 'Leave a comment', 'theme1' ), __( '1 Comment', 'theme1' ), __( '% Comments', 'theme1' ) );
                    echo '</span>';
                }
            ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer continue-reading">
        <?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'theme1') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
    </footer><!-- .entry-footer -->
	</div><!-- .index-box -->
</article><!-- #post-## -->