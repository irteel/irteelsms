<?php

// Step 1: set your API_KEY from https://mywebhost.com/developers

$token = '3|QuHFBjqd8Hyatnd1vthoDy3FJvMRKRDuufzj';

// Step 2: Replace your Install URL like https://mywebhost.com/sms/api with https://sms.irteel.com/api/v3
// <api/v3> is mandatory.

$url = 'https://sms.irteel.com/api/v3/';

// Create SMS request

$gateway_url = $url . 'balance';

try {
    $ch = curl_init();
	$authorization = 'Authorization: Bearer '.$token;	
    curl_setopt($ch, CURLOPT_URL, $gateway_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization ));		
    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}
