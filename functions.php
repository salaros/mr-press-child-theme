<?php

if ( ! class_exists( 'Timber' ) ) {
    return;
}

use Salaros\Wordpress\Template\WordPressSite;

$site = new WordPressSite;

$site->initialize();
