<?php

// Step 1: set your API_KEY from https://my.irteelsms.com/developers

$token = '3|39VVNH7w6pTaNEUgnTzpcX1iDsmnulcqFyMBv3TR ';


// Step 2: Set url to https://my.irteelsms.com/api/v3/
// <api/v3> is mandatory.

$url = 'https://my.irteelsms.com/api/v3/';


$gateway_url = $url .'balance';

try {
    $ch = curl_init($url);
    $authorization = 'Authorization: Bearer '.$token;
    curl_setopt($ch, CURLOPT_URL, $gateway_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    $headers = array(
		   "Content-Type: application/json",
		   $authorization,
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);	
    $output = curl_exec($ch);


    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}


/*Returns
Returns a contact object if the request was successful.

JSON
{
    "status": "success",
    "data": "sms unit with all details",
}
If the request failed, an error object will be returned.

JSON
{
    "status": "error",
    "message" : "A human-readable description of the error."
}
*/