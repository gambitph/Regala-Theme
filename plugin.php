<?php

/*
 * Titan Framework options sample code. We've placed here some
 * working examples to get your feet wet
 * @see	http://www.titanframework.net/get-started/
 */

add_action( 'tf_create_options', 'regala_default_image_options' );

 /**
 * Initialize Titan & options here
 */
function regala_default_image_options() {

 	$titan = TitanFramework::getInstance( 'regala' );



    /**
     *   Default featured images
     */
     
    $image = $titan->createThemeCustomizerSection( array(
        'name' => __( 'Default Featured Images', 'regala' ),
        'desc' => __( 'Upload a photo that you want to use as Featured Image in your Posts/Pages', 'regala' ),
    ) );
    
    $image->createOption( array(
        'name' => __( 'Image 1', 'regala' ),
        'id' => 'featured_image',
        'type' => 'upload',
    ) );

    $image->createOption( array(
        'name' => __( 'Image 2', 'regala' ),
        'id' => 'featured_image2',
        'type' => 'upload',
    ) );

    $image->createOption( array(
        'name' => __( 'Image 3', 'regala' ),
        'id' => 'featured_image3',
        'type' => 'upload',
    ) );

    $image->createOption( array(
        'name' => __( 'Image 4', 'regala' ),
        'id' => 'featured_image4',
        'type' => 'upload', 
    ) );

    $image->createOption( array(
        'name' => __( 'Image 5', 'regala' ),
        'id' => 'featured_image5',
        'type' => 'upload',
    ) );
    
}