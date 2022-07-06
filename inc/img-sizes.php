<?php
add_action( 'after_setup_theme', 'localmedia_img_sizes' );
function localmedia_img_sizes() {

	// Grösse des Coverbilds gem. Design und X 2 (bsp hier Seitenverhältnis 2 zu 1)
    add_image_size( 'cover-sm', 540, 338, true );
    add_image_size( 'cover-smX2', 1080, 675, true );
    add_image_size( 'cover-md', 991, 464, true );
    add_image_size( 'cover-mdX2', 1982, 929, true );
    add_image_size( 'cover-lg', 1920, 700, true );
    add_image_size( 'cover-lgX2', 2480, 904, true );

    // Bsp von quadratischer Gallery bei 4 Spalten Layout: col-6 col-lg-4
    add_image_size( 'gallery-mobile', 540, 540, true );
    add_image_size( 'gallery-mobileX2', 1080, 1080, true );
    add_image_size( 'gallery', 1080, 1080, true );
    add_image_size( 'galleryX2', 2160, 2160, true );
}


add_action('intermediate_image_sizes_advanced', 'disable_image_sizes');
function disable_image_sizes($sizes) {
	// disable generated image sizes
	unset($sizes['medium']);       // disable medium size
	unset($sizes['large']);        // disable large size
	unset($sizes['medium_large']); // disable medium-large size
	unset($sizes['1536x1536']);    // disable 2x medium-large size
	unset($sizes['2048x2048']);    // disable 2x large size

	return $sizes;
}


add_filter( 'max_srcset_image_width', 'lm_max_srcset_image_width', 10 , 2 );
function lm_max_srcset_image_width() {
	// set the max image width
	return 2480;
}
