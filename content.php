<?php
$articleStyle = "";

$backgroundImage = '';
if ( has_post_thumbnail() ) { 
    $imageAttributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'regala-wallpaper' );
	
	if ( ! empty( $imageAttributes ) ) {
		$backgroundImage = $imageAttributes[0];
	}
}

if ( ! empty( $backgroundImage ) ) {
	?>
	<style>
	article.post-<?php the_ID(); ?> {
        background: linear-gradient(45deg, rgba(41,51,56,0.4) 0%,rgba(41,51,56,0.3) 48%,rgba(41,51,56,0) 100%), url( <?php echo esc_url( $backgroundImage ) ?> );
	}
	</style>
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-inner">
		<h2 class="entry-title"><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></h2>
		<span class="entry-category"><?php regala_entry_category() ?></span>
		<span class="entry-date"><?php regala_posted_on() ?></span>
		<div class="entry-content">
			<?php the_excerpt() ?>
			<?php echo '<a href="' . get_permalink() . '" class="btn" title="' . __( 'Continue Reading', 'regala' ) . ' ' . esc_attr( get_the_title() ) . '" rel="bookmark">' . __( 'Continue reading', 'regala' ) . '</a>' ?>
		</div>
	</div>
</article>