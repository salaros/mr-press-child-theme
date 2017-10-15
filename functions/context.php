<?php

global $wp;

$site_context = [
	'redirect_url' => add_query_arg( $wp->query_string, '', home_url( $wp->request ) ),
];

$site->add_to_context( $site_context );
