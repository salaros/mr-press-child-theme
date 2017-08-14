<?php

add_action( 'wp_ajax_some_ajax_function', 'mr_press_some_ajax_function' );
add_action( 'wp_ajax_nopriv_some_ajax_function', 'mr_press_some_ajax_function' );

function mr_press_some_ajax_function() {

	check_ajax_referer( 'security_0123456789', 'survey_nonce' );

	if ( ! isset( $_POST['myvar'] ) || empty( $_POST['myvar'] ) ) {
		echo( wp_json_encode(
			[
				'error' => true,
				'message' => 'myvar is empty',
			]
		) );
		return;
	}

	$my_string = sanitize_text_field( $_POST['my_string'] );
	echo( wp_json_encode(
		[
			'error' => false,
			'result' => 'OK',
			'myvar' => $my_string,
		]
	) );
	return;
}

/****************   HOW TO USE IT   ******************

<?php
//Set Your Nonce
$ajax_nonce = wp_create_nonce( "security_0123456789" );
?>

<script type="text/javascript">
jQuery(document).ready(function($){
	var data = {
		action: 'my_action',
		survey_nonce: '<?php echo $ajax_nonce; ?>',
		my_string: 'Hello World!'
	};
	$.post(ajaxurl, data, function(response) {
		alert("Response: " + response);
	});
});
</script>

*/
