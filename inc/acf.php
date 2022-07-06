<?php

/*------------------------------------*\
    ACF Setup
\*------------------------------------*/

// ****  fix to be able to add shortcodes to textareas

add_filter('acf/format_value/type=textarea', 'do_shortcode');

// ********  switch for fields to hide for non admin

// add_action('acf/render_field_settings', 'my_admin_only_render_field_settings');
//
// function my_admin_only_render_field_settings( $field ) {
//
// 	acf_render_field_setting( $field, array(
// 		'label'			=> __('Admin Only?', 'html5blank' ),
// 		'instructions'	=> '',
// 		'name'			=> 'admin_only',
// 		'type'			=> 'true_false',
// 		'ui'			=> 1,
// 	), true);
//
// }



if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' 	=> 'Global Content',
        'menu_title'	=> 'Globale Inhalte',
        'menu_slug' 	=> 'global-content',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    // add another option page

    // acf_add_options_sub_page(array(
    // 	'page_title' 	=> 'CTA',
    // 	'menu_title'	=> 'CTA',
    // 	'parent_slug'	=> 'global-content',
    // ));
}



function get_cover_image() {
    $post = get_queried_object();
    if(isset($post->post_type) || isset($post->taxonomy)) {
        $bild = get_field('cover_img');
    }
    if(!empty($bild)) {
        return $bild;
    } else {
        return false;
    }
}
function yoast_presentation_image($presentation) {
  $img = get_cover_image();
  if($img && !empty($img)) {
      $presentation->open_graph_images = [
          [
              'url' => $img['url'],
              'width' => 1200,
              'height' => 630,
              'type' => $img['mime_type']
          ]
      ];
  }
  return $presentation;
}
add_filter('wpseo_frontend_presentation', 'yoast_presentation_image', 30);
