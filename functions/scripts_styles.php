<?php

//this is where you can add your javascript entries
$site->add_script( 'respond', $site->theme->bower_url.'/respond/dest/respond.min.js', [], '1.4.2', false, ['conditional' => 'lt IE 9'] );
$site->add_script( 'html5shiv', $site->theme->bower_url.'/html5shiv/dist/html5shiv.min.js', [], '3.7.3', false, ['conditional' => 'lt IE 9'] );
$site->add_script( 'bootstrap', $site->theme->bower_url.'/bootstrap/dist/js/bootstrap.min.js', ['jquery'], '3.3.6', true );
$site->add_script( 'site', $site->theme->link.'/static/js/site.js', ['bootstrap'], '0.2.1', true );

//this is where you can add your CSS entries
$site->add_style( 'normalize', $site->theme->bower_url.'/normalize.css/normalize.css' );
$site->add_style( 'bootstrap', $site->theme->bower_url.'/bootstrap/dist/css/bootstrap.min.css' );
$site->add_style( 'mr-press', $site->theme->parent->link.'/style.css' );

//this is where you can add your CSS entries for wp-admin UI
$site->add_admin_style( 'custom-admin', $site->theme->static_url.'/css/admin.css' );
