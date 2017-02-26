<?php

if ( ! class_exists( 'Timber' ) ) {
	return;
}

use Salaros\Wordpress\Template\WordPressSite;

$site = new WordPressSite;

$site->ui_toolkit = 'semantic-ui';

if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
	include_once 'functions/ajax.php';
}

require_once 'functions/constants.php';
require_once 'functions/menus.php';
require_once 'functions/post_types.php';
require_once 'functions/scripts_styles.php';
require_once 'functions/taxonomies.php';
require_once 'functions/theme_support.php';

$site->initialize();
