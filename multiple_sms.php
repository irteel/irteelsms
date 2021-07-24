<?php

// Step 1: set your API_KEY from https://mywebhost.com/developers

$token = '3|QuHFBjqd8Hyatnd1vthoDy3FJvMRKRDuufzj';

// Step 2: Change the from number below. It can be a valid phone number or a String
$sender_id = 'irteel';

// Step 3: the number we are sending to - Any phone number
// Using comma (,) at end of the every phone number. You must have to insert country code at beginning of the number
//You can insert maximum 100 number at a time
$destination = '237695601314,8801721000000,8801813000000,8801670000000,8801913000000';
// Step 4: Replace your Install URL like https://mywebhost.com/sms/api with https://sms.irteel.com/api/v3
// <api/v3> is mandatory.

$url = 'https://sms.irteel.com/api/v3/';

// the sms body
$message = 'test message from irteel SMS';

// Create SMS Body for request
$sms_body = array(
    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message,
);

$send_data = json_encode($sms_body);

$gateway_url = $url .'sms/send';

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

    curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data);		
    $output = curl_exec($ch);


    if (curl_errno($ch)) {
        $output = curl_error($ch);
    }
    curl_close($ch);

    var_dump($output);

}catch (Exception $exception){
    echo $exception->getMessage();
}
