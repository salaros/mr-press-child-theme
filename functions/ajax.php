<?php

add_action( 'wp_ajax_some_ajax_function', 'mr_press_some_ajax_function' );
add_action( 'wp_ajax_nopriv_some_ajax_function', 'mr_press_some_ajax_function' );

function mr_press_some_ajax_function() {

	check_ajax_referer( 'ajax-verification-string', 'security' );

	if ( ! isset( $_POST['myvar'] ) || empty( $_POST['myvar'] ) ) {
		$myvar = sanitize_text_field( $_POST['my_string'] );
		$error = [
			'error' => true,
			'message' => 'myvar is empty',
		];
		exit( wp_json_encode( $error ) );
	}

	$error = [
		'error' => false,
		'result' => 'OK',
	];
	exit( wp_json_encode( $error ) );
}

/****************   HOW TO USE IT   ******************

<?php
//Set Your Nonce
$ajax_nonce = wp_create_nonce( "ajax-verification-string" );
?>

<script type="text/javascript">
jQuery(document).ready(function($){
	var data = {
		action: 'my_action',
		security: '<?php echo $ajax_nonce; ?>',
		my_string: 'Hello World!'
	};
	$.post(ajaxurl, data, function(response) {
		alert("Response: " + response);
	});
});
</script>

*/
