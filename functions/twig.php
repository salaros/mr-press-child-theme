<?php

// Enable Timber (Twig) cache on non-production environments
if ( class_exists( 'Timber' ) ) {
	Timber::$cache = false; // (WP_ENV === 'production');
}
