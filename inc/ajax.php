<?php
function custom_ajax_handler() 
{
    // Check if the request is coming from a valid source
    if ( check_ajax_referer('ajax_nonce', 'ajax_nonce') ) {  
		
		// Get the data from the AJAX request
        $callback = sanitize_text_field( $_POST['callback'] );

		// The function exists, so you can call it dynamically
		if ( ! ( isset( $callback ) && is_string( $callback ) && function_exists( $callback ) ) )
			wp_send_json_error( array('message' => 'callback does not exists') );

		// Send a response back to the client
		$response =[
			'message' => 'Data received successfully.',
			'payload' => $callback(),
		];

		wp_send_json_success( $response );
        // Always exit to avoid further execution
    } else {
        // Invalid nonce, reject the request
        wp_send_json_error( array('message' => 'Invalid nonce.') );
    }

	wp_die();
}  
function fetchapidata()
{
	return $_POST;
}
add_action('wp_ajax_custom_ajax_action', 'custom_ajax_handler');
add_action('wp_ajax_nopriv_custom_ajax_action', 'custom_ajax_handler');