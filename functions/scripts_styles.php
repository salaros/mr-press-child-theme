<?php

$bower_url = $site->theme->bower_url;

//this is where you can add your javascript entries
$site->add_script( 'respond', sprintf( '%s/respond/dest/respond.min.js', $bower_url ), [], '1.4.2', false, ['conditional' => 'lt IE 9'] );
$site->add_script( 'html5shiv', sprintf( '%s/html5shiv/dist/html5shiv.min.js', $bower_url), [], '3.7.3', false, ['conditional' => 'lt IE 9'] );
$site->add_script( 'bootstrap', sprintf( '%s/bootstrap/dist/js/bootstrap.min.js', $bower_url), ['jquery'], '3.3.6', true );
$site->add_script( 'site', sprintf( '%s/static/js/site.js', $site->theme->link) , ['bootstrap'], '0.2.1', true );

//this is where you can add your CSS entries
$site->add_style( 'normalize', sprintf( '%s/normalize.css/normalize.css', $bower_url ) );
$site->add_style( 'bootstrap', sprintf( '%s/bootstrap/dist/css/bootstrap.min.css', $bower_url ) );
$site->add_style( 'mr-press', sprintf( '%s/style.css', $site->theme->parent->link );

//this is where you can add your CSS entries for wp-admin UI
$site->add_admin_style( 'custom-admin', sprintf( '%s/css/admin.css', $site->theme->static_url ) );

