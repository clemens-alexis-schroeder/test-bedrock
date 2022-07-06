<?php
//
//nur p und h2 und h3 im wysiwyg anzeigen
function my_format_TinyMCE( $in ) {
        $in['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3";

    return $in;
}
add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );


// Button Format hinzufügen
// function my_mce_before_init_insert_formats( $init_array ) {
// 	// Define the style_formats array
// 	$style_formats = array(
// 		// Each array child is a format with it's own settings
// 		array(
// 			'title' => 'Button Blau',
// 			'block' => 'div',
// 			'classes' => 'button--blue',
// 			'wrapper' => true,
//
// 		),
// 	);
// 	// Insert the array, JSON ENCODED, into 'style_formats'
// 	$init_array['style_formats'] = wp_json_encode( $style_formats );
//
// 	return $init_array;
//
// }
// // Attach callback to 'tiny_mce_before_init'
// add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


/**
 * Registers an editor stylesheet for the theme.
 */
// function wpdocs_theme_add_editor_styles() {
//     add_editor_style( '_wysiwyg.css' );
// }
// add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );



function my_toolbars( $toolbars ) {
	$toolbars['Full'] = array();
	$toolbars['Full'][1] = array('formatselect', 'styleselect', 'bold', 'italic', 'underline', 'bullist', 'numlist', 'link');
	// $toolbars['Full'][2] = array('styleselect', 'formatselect', 'fontselect', 'fontsizeselect', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' );

	// remove the 'Basic' toolbar completely (if you want)
	// unset( $toolbars['Basic' ] );

	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars' , 'my_toolbars');
