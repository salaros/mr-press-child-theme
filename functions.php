<?php

if ( ! class_exists( 'Timber' ) ) {
	return;
}

use Salaros\Wordpress\Template\WordPressSite;

$site = new WordPressSite;

$site->ui_toolkit = 'semantic-ui';

require_once 'functions/menus.php';
require_once 'functions/post_types.php';
require_once 'functions/scripts_styles.php';
require_once 'functions/taxonomies.php';
require_once 'functions/theme_support.php';

$site->initialize();
