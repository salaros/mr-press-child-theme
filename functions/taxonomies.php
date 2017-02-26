<?php

$text_domain = $site->get_text_domain();

// Add new taxonomy, hierarchical
$genre_labels = array(
	'name'              => _x( 'Genres', 'taxonomy general name', $text_domain ),
	'singular_name'     => _x( 'Genre', 'taxonomy singular name', $text_domain ),
	'search_items'      => __( 'Search Genres', $text_domain ),
	'all_items'         => __( 'All Genres', $text_domain ),
	'parent_item'       => __( 'Parent Genre', $text_domain ),
	'parent_item_colon' => __( 'Parent Genre:', $text_domain ),
	'edit_item'         => __( 'Edit Genre', $text_domain ),
	'update_item'       => __( 'Update Genre', $text_domain ),
	'add_new_item'      => __( 'Add New Genre', $text_domain ),
	'new_item_name'     => __( 'New Genre Name', $text_domain ),
	'menu_name'         => __( 'Genre', $text_domain ),
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
	'name'                       => _x( 'Writers', 'taxonomy general name', $text_domain ),
	'singular_name'              => _x( 'Writer', 'taxonomy singular name', $text_domain ),
	'search_items'               => __( 'Search Writers', $text_domain ),
	'popular_items'              => __( 'Popular Writers', $text_domain ),
	'all_items'                  => __( 'All Writers', $text_domain ),
	'parent_item'                => null,
	'parent_item_colon'          => null,
	'edit_item'                  => __( 'Edit Writer', $text_domain ),
	'update_item'                => __( 'Update Writer', $text_domain ),
	'add_new_item'               => __( 'Add New Writer', $text_domain ),
	'new_item_name'              => __( 'New Writer Name', $text_domain ),
	'separate_items_with_commas' => __( 'Separate writers with commas', $text_domain ),
	'add_or_remove_items'        => __( 'Add or remove writers', $text_domain ),
	'choose_from_most_used'      => __( 'Choose from the most used writers', $text_domain ),
	'not_found'                  => __( 'No writers found.', $text_domain ),
	'menu_name'                  => __( 'Writers', $text_domain ),
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
