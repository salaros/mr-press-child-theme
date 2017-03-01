<?php

if ( ! function_exists( 'register_field_group' ) ) {
	return;
}

register_field_group(
	[
		'id' => 'acf_test-group',
		'title' => 'Test group',
		'fields' => [
			[
				'key' => 'field_1000000000000',
				'label' => 'Test bool',
				'name' => 'test_bool',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			],
		],
		'options' => [ 
		'position' => 'normal',
		'layout' => 'no_box',
		'hide_on_screen' => [],
		],
		'menu_order' => 0,
	]
);
