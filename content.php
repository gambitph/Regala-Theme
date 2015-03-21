<?php
global $fillerFeaturedImageIDs;

// Get filler featured images for posts without featured images
if ( empty( $fillerFeaturedImageIDs ) ) {
    
    if ( class_exists( 'TitanFramework' ) ) {
	
        $titan = TitanFramework::getInstance( 'regala' );
    
        $fillerFeaturedImageIDs = array();
    
        $imageID = $titan->getOption( 'featured_image' );
        if ( ! empty( $imageID ) ) {
            $fillerFeaturedImageIDs[] = $imageID;
        }
        $imageID = $titan->getOption( 'featured_image2' );
        if ( ! empty( $imageID ) ) {
            $fillerFeaturedImageIDs[] = $imageID;
        }
        $imageID = $titan->getOption( 'featured_image3' );
        if ( ! empty( $imageID ) ) {
            $fillerFeaturedImageIDs[] = $imageID;
        }
        $imageID = $titan->getOption( 'featured_image4' );
        if ( ! empty( $imageID ) ) {
            $fillerFeaturedImageIDs[] = $imageID;
        }
        $imageID = $titan->getOption( 'featured_image5' );
        if ( ! empty( $imageID ) ) {
            $fillerFeaturedImageIDs[] = $imageID;
        }
    
    }
}

$imageAttributes = null;

// If the post has a featured image, show it
if ( has_post_thumbnail() ) { 
    $imageAttributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'regala-wallpaper' );
	
// If the post doesn't have a featured image, then use a filler image if there is one
} else if ( ! empty( $fillerFeaturedImageIDs ) ) {
        
    // Cycle through the list of filler images
    $imageID = array_shift( $fillerFeaturedImageIDs );
    $fillerFeaturedImageIDs[] = $imageID;
    
    $imageAttributes = wp_get_attachment_image_src( $imageID, 'regala-wallpaper' );
}

if ( ! empty( $imageAttributes ) ) {
	?>
	<style>
	article.post-<?php the_ID(); ?> {
        background: linear-gradient(45deg, rgba(41,51,56,0.4) 0%,rgba(41,51,56,0.3) 48%,rgba(41,51,56,0) 100%), url( <?php echo esc_url( $imageAttributes[0] ) ?> );
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
			<div class='clearfix'></div>
			<?php echo '<a href="' . get_permalink() . '" class="btn" title="' . __( 'Continue Reading', 'regala' ) . ' ' . esc_attr( get_the_title() ) . '" rel="bookmark">' . __( 'Continue reading', 'regala' ) . '</a>' ?>
		</div>
	</div>
</article>