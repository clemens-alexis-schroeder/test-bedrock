<?php

/*------------------------------------*\
	Custom Post Types with Category
\*------------------------------------*/
//
function create_post_type_news()
{
    register_post_type('news', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('News', 'news'), // Rename these to suit
            'singular_name' => __('News', 'news'),
            'add_new' => __('Beitrag hinzufgen', 'html5blank'),
            'add_new_item' => __('Beitrag hinzufügen', 'news'),
            'edit' => __('Bearbeiten', 'news'),
            'edit_item' => __('Beitrag Bearbeiten', 'news'),
            'new_item' => __('Neuer Beitrag', 'news'),
            'view' => __('Zeige Beitrag', 'news'),
            'view_item' => __('Zeige Beitrag', 'news'),
            'search_items' => __('Suche Beitrag', 'news'),
            'not_found' => __('Kein Beitrag', 'news'),
            'not_found_in_trash' => __('Kein Beitrag im Papierkorb gefunden', 'news')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => false,
        'menu_icon'           => 'dashicons-analytics',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'kategorien'
        ) // Add Category and Post Tags support
    ));
}
add_action('init', 'create_post_type_news'); // Add our HTML5 Blank Custom Post Type

add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
    register_taxonomy(
        'kategorien',
        'news',
        array(
            'labels' => array(
                'name' => 'Kategorie',
                'add_new_item' => 'Kategorie hinzufügen',
                'new_item_name' => "Neuer Kategorie Type"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'show_admin_column' => true,
            'query_var' => true,
        )
    );
}
