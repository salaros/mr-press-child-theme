<?php

// Add new taxonomy, hierarchical
$genre_labels = array(
    'name'              => _x( 'Genres', 'taxonomy general name' ),
    'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Genres' ),
    'all_items'         => __( 'All Genres' ),
    'parent_item'       => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item'         => __( 'Edit Genre' ),
    'update_item'       => __( 'Update Genre' ),
    'add_new_item'      => __( 'Add New Genre' ),
    'new_item_name'     => __( 'New Genre Name' ),
    'menu_name'         => __( 'Genre' ),
);

$genre_args = array(
    'hierarchical'      => true,
    'labels'            => $genre_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'genre' ),
);

// Add new taxonomy, NOT hierarchical (like tags)
$writer_labels = array(
    'name'                       => _x( 'Writers', 'taxonomy general name' ),
    'singular_name'              => _x( 'Writer', 'taxonomy singular name' ),
    'search_items'               => __( 'Search Writers' ),
    'popular_items'              => __( 'Popular Writers' ),
    'all_items'                  => __( 'All Writers' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Writer' ),
    'update_item'                => __( 'Update Writer' ),
    'add_new_item'               => __( 'Add New Writer' ),
    'new_item_name'              => __( 'New Writer Name' ),
    'separate_items_with_commas' => __( 'Separate writers with commas' ),
    'add_or_remove_items'        => __( 'Add or remove writers' ),
    'choose_from_most_used'      => __( 'Choose from the most used writers' ),
    'not_found'                  => __( 'No writers found.' ),
    'menu_name'                  => __( 'Writers' ),
);

$writer_args = array(
    'hierarchical'          => false,
    'labels'                => $writer_labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'writer' ),
);

$site->add_taxonomy( 'genre', [ 'book' ], $genre_args );
$site->add_taxonomy( 'writer', [ 'book' ], $writer_args );
