<?php

// Enable Timber (Twig) cache on non-production environments
if ( class_exists( 'Timber' ) ) {
	Timber::$cache = ( defined( 'WP_ENV' ) && 'production' === WP_ENV );
}
