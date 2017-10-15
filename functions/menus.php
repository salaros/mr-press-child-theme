<?php

// Register the main menu
// this is where you can add your menus to re-create menu and its items just remove it
$menu_items = [];
$menu_items[] = [ 'title' => translate( 'Home' ), 'url' => '/' ];
$menu_items[] = [ 'slug' => 'sample-page' ];
$menu_items[] = [
	'title' => translate( 'Search engines' ),
	'children' => [
		[ 'title' => translate( 'Google' ), 'url' => 'http://google.com' ],
		[ 'title' => translate( 'Bing' ), 'url' => 'http://bing.com' ],
	],
];
$site->add_menu( 'top-nav-menu', $menu_items );
