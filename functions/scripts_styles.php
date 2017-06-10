<?php

$bower_url = $site->theme->bower_url;

//this is where you can add your javascript entries
$site->assets->add_script( 'site', sprintf( '%s/static/js/site.js', $site->theme->link ) , [ 'bootstrap' ], '0.2.1', true );

//this is where you can add your CSS entries
$site->assets->add_style( 'normalize', sprintf( '%s/normalize.css/normalize.css', $bower_url, [], '3.0.3' ) );

//this is where you can add your CSS entries for wp-admin UI
$site->assets->add_admin_style( 'custom-admin', sprintf( '%s/css/admin.css', $site->theme->static_url ) );

switch ( $site->ui_toolkit ) {
	case 'bootstrap':
		$site->assets->add_script( 'respond', sprintf( '%s/respond/dest/respond.min.js', $bower_url ), [], '1.4.2', false, [ 'conditional' => 'lt IE 9' ] );
		$site->assets->add_script( 'html5shiv', sprintf( '%s/html5shiv/dist/html5shiv.min.js', $bower_url ), [], '3.7.3', false, [ 'conditional' => 'lt IE 9' ] );
		$site->assets->add_script( 'bootstrap', sprintf( '%s/bootstrap/dist/js/bootstrap.min.js', $bower_url ), [ 'jquery' ], '3.3.7', true );
		$site->assets->add_style( 'bootstrap', sprintf( '%s/bootstrap/dist/css/bootstrap.min.css', $bower_url, [ 'normalize' ] ) );
		$site->assets->add_script( 'mr-press', sprintf( '%s/%s/mr-press.js', $site->theme->link, $site->ui_toolkit ), [ 'bootstrap' ], null, true );
		$site->assets->add_style( 'mr-press', sprintf( '%s/%s/mr-press.css', $site->theme->link, $site->ui_toolkit ), [ 'bootstrap' ] );
		break;

	case 'semantic-ui':
		$site->assets->add_script( 'semantic-ui', sprintf( '%s/semantic/dist/semantic.min.js', $bower_url ), [ 'jquery' ], '2.2.9', true );
		$site->assets->add_style( 'semantic-ui', sprintf( '%s/semantic/dist/semantic.min.css', $bower_url ), [ 'normalize' ] );
		$site->assets->add_script( 'mr-press', sprintf( '%s/%s/mr-press.js', $site->theme->link, $site->ui_toolkit ), [ 'semantic-ui' ], null, true );
		$site->assets->add_style( 'mr-press', sprintf( '%s/%s/mr-press.css', $site->theme->link, $site->ui_toolkit ), [ 'semantic-ui' ] );
		break;

	default:
		trigger_error( sprintf( 'Unknown UI kit, please edit "%s" file', realpath( __FILE__ ) ) );
		break;
}
