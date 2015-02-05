<?php

	session_start();
    if(isset($_SESSION['access_token']) || !empty($_SESSION['access_token'])) {

        $postData = file_get_contents('php://input');

		$authToken = 'Basic c2lubWluOnNpbm1pbg==';

		$method = apache_request_headers()['Method-Name'];

		// Setup cURL
		$ch = curl_init('http://sinhala-corpus.projects.uom.lk/SinminREST/rest/api/'.$method);
		curl_setopt_array($ch, array(
		    CURLOPT_POST => TRUE,
		    CURLOPT_RETURNTRANSFER => TRUE,
		    CURLOPT_HTTPHEADER => array(
		        'Authorization: '.$authToken,
		        'Content-Type: application/json',
		        'Accept: application/json'
		    ),
		    CURLOPT_POSTFIELDS => $postData
		));

		// Send the request
		$response = curl_exec($ch);

		// Check for errors
		if($response === FALSE){
		    die(curl_error($ch));
		}

		print_r( $response);
    }else{
    	header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => 500)));
    }
	

?>