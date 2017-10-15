<?php

// Enable Timber (Twig) cache on non-production environments
if ( class_exists( 'Timber' ) ) {
	Timber::$cache = false; // (WP_ENV === 'production');
}

// Remove the following meta tag:  <meta name="generator" content="WordPress X.X" />
add_filter( 'the_generator', '__return_null' );

// Remove the following meta tag: <meta name="generator" content="qTranslate-XXXXX" />
remove_action( 'wp_head', 'qtranxf_wp_head_meta_generator' );

// Remove 'ver' query var from script and style URLs
function mr_press_remove_ver_query_for_scripts_and_styles( $url ) {

	return ( stripos( $url, 'ver=' ) )
		? remove_query_arg( 'ver', $url )
		: $url;
}
add_filter( 'style_loader_src', 'mr_press_remove_ver_query_for_scripts_and_styles', 999 );
add_filter( 'script_loader_src', 'mr_press_remove_ver_query_for_scripts_and_styles', 999 );

add_action( 'init', function() use ( $site ) {
	// Remove Emoji detection (for it's poor implementation)
	$site->remove_emoji_detection();

	// Disable Embeds in WordPress
	$site->remove_embeds();

	// Remove admin bar for non-admin users
	$site->hide_admin_bar_for_users();
} );
