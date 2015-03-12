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

<?php
if ( ! empty( $imageAttributes ) ) { ?>
    <style>
    .site-main article.post-<?php the_ID(); ?> {
        background: linear-gradient(45deg, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0.1) 48%,rgba(0,0,0,0) 100%), url( <?php echo $imageAttributes[0]; ?> );
        background-size: cover;
    }
<?php } ?>

</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
    if ( has_post_thumbnail() ) {
        ?>
        <a href="<?php echo get_permalink(); ?>" class="feat-image">
            <img src="<?php echo $imageAttributes[0]; ?>" />
        </a>
    <?php } ?>
    
    <div class='index-box'>
    
        <header class="entry-header">
        	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

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
    </a>
</article><!-- #post-## -->