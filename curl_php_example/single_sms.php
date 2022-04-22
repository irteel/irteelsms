<?php

// Step 1: set your API_KEY from https://my.irteelsms.com/developers

$token = '3|39VVNH7w6pTaNEUgnTzpcX1iDsmnulcqFyMBv3TR ';

// Step 2: Change the from number below. It can be a valid phone number or a String
$sender_id = 'irteel';

// Step 3: the number we are sending to - Any phone number
// Using comma (,) at end of the every phone number. You must have to insert country code at beginning of the number
//You can insert maximum 100 number at a time
$recipient = '237695601314';

// Step 4: Set url to https://my.irteelsms.com/api/v3
// <api/v3> is mandatory.

$url = 'https://my.irteelsms.com/api/v3/';

// the sms type (Plain or Unicode)
$type = 'plain';

// the sms body
$message = 'test message from irteel SMS';

// Create SMS Body for request
$sms_body = array(
    'recipient' => $recipient,
    'sender_id' => $sender_id,
	'type'      => $type,
    'message'   => $message,
);

$send_data = json_encode($sms_body);

$gateway_url = $url .'sms/send';

try {
    $ch = curl_init($url);
    $authorization = 'Authorization: Bearer '.$token;
    curl_setopt($ch, CURLOPT_URL, $gateway_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = array(
		   "Content-Type: application/json",
		   $authorization,
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);		
    $output = curl_exec($ch);


    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    //var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}



/*Returns
Returns a contact object if the request was successful.

JSON
{
    "status": "success",
    "data": "sms reports with all details",
}
If the request failed, an error object will be returned.

JSON
{
    "status": "error",
    "message" : "A human-readable description of the error."
}*/