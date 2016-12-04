<?php

$text_domain = $site->get_text_domain();

$book_labels = array(
    'name'               => _x( 'Books', 'post type general name', $text_domain ),
    'singular_name'      => _x( 'Book', 'post type singular name', $text_domain ),
    'menu_name'          => _x( 'Books', 'admin menu', $text_domain ),
    'name_admin_bar'     => _x( 'Book', 'add new on admin bar', $text_domain ),
    'add_new'            => _x( 'Add New', 'book', $text_domain ),
    'add_new_item'       => __( 'Add New Book', $text_domain ),
    'new_item'           => __( 'New Book', $text_domain ),
    'edit_item'          => __( 'Edit Book', $text_domain ),
    'view_item'          => __( 'View Book', $text_domain ),
    'all_items'          => __( 'All Books', $text_domain ),
    'search_items'       => __( 'Search Books', $text_domain ),
    'parent_item_colon'  => __( 'Parent Books:', $text_domain ),
    'not_found'          => __( 'No books found.', $text_domain ),
    'not_found_in_trash' => __( 'No books found in Trash.', $text_domain )
);

$event_args = array(
    'labels'             => $event_labels,
    'description'        => __( 'Event description.', $text_domain ),
    'public'             => true,
    'publicly_queryable' => true,
    'exclude_from_search'=> false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'event' ),
    'capability_type'    => 'post',
    'menu_icon'          => 'dashicons-book',  // !!! set a custom Dashicons icon here
    'can_export'         => true,
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

$site->add_post_type( 'book', $book_args );
$site->unregister_post_type( 'test_type' );
