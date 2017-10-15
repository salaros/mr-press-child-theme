<?php

add_action( 'init', function() use ( $site ) {
	// Remove the following meta tag:  <meta name="generator" content="WordPress X.X" />
	add_filter( 'the_generator', '__return_null' );

	// Remove the following meta tag: <meta name="generator" content="qTranslate-XXXXX" />
	remove_action( 'wp_head', 'qtranxf_wp_head_meta_generator' );

	// Remove admin bar for non-admin users
	add_filter( 'show_admin_bar', '__return_false' );

	// Remove 'ver' query var from script and style URLs
	add_filter( 'style_loader_src', 'mr_press_remove_ver_query_for_scripts_and_styles', 999 );
	add_filter( 'script_loader_src', 'mr_press_remove_ver_query_for_scripts_and_styles', 999 );

	// Disable emoji functionality introduced in WordPress 4.2
	mr_remove_emoji_detection();

	// Disable so-called enhanced embeds introduced in WordPress 4.4
	mr_remove_embeds();
} );

// Remove 'ver' query var from script and style URLs
function mr_press_remove_ver_query_for_scripts_and_styles( $url ) {
	return ( stripos( $url, 'ver=' ) )
		? remove_query_arg( 'ver', $url )
		: $url;
}

// Disable emoji functionality introduced in WordPress 4.2
function mr_remove_emoji_detection() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// remove the DNS prefetch
	add_filter( 'emoji_svg_url', '__return_false' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', function ( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		}
		return array();
	});
}

// Disable so-called enhanced embeds introduced in WordPress 4.4
function mr_remove_embeds() {
	// Use the wp_dequeue_script function to dequeue 'wp-embed' script
	add_action( 'wp_footer', function () {
		wp_dequeue_script( 'wp-embed' );
	});

	// Remove the REST API endpoint.
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );

	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

	// Remove oEmbed-specific JavaScript from the front-end
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );

	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );

	// Remove oEmbed-specific JavaScript from the back-end
	add_filter( 'tiny_mce_plugins', function ( $plugins ) {
		return array_diff( $plugins, array( 'wpembed' ) );
	} );

	add_action('after_switch_theme', function () {
		// Remove all embeds rewrite rules.
		add_filter( 'rewrite_rules_array', function ( $rules ) {
			foreach ( $rules as $rule => $rewrite ) {
				if ( false !== strpos( $rewrite, 'embed=true' ) ) {
					unset( $rules[ $rule ] );
					break;
				}
			}

			return $rules;
		} );
		flush_rewrite_rules();
	});

	// Remove filter of the oEmbed result before any HTTP requests are made.
	remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );

	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
}
