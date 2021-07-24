<?php

/* Send an SMS using IRTEEL SMS. You can run this file 3 different ways:
 *
 * 1. Save it as example2.php and at the command line, run
 *         php example2.php
 *
 * 2. Upload it to a web host and load mywebhost.com/example.php
 *    in a web browser.
 *
 * 3. Download a local server like WAMP, MAMP or XAMPP. Point the web root
 *    directory to the folder containing this file, and load
 *    localhost:8888/example.php in a web browser.
 */



// Step 1: Get the IRTEEL SMS API library from https://github.com/irteel/irteelsms
// following the instructions to install it with Composer.

require_once 'src/IRTEELSMS.php';


use IRTEELSMS\IRTEELSMS;



// Step 2: set your Token from https://mywebhost.com/developers

$token = '3|gcQuHFBjqd8Hyatnd1vthoDy3FJvMRKRDuufzjAP';


// Step 3: Change the from number below. It can be a valid phone number or a String
$sender_id = 'irteel';

// Step 4: the number we are sending to - Any phone number
$destination = '237695601314';

// Step 5: Replace your Install URL like https://mywebhost.com/sms/api with https://sms.irteel.com/api/v3
// <api/v3> is mandatory.

$url = 'https://sms.irteel.com/api/v3/';

// the sms body
$message = 'test message from irteel SMS V2';


// Create Message Body for request
$sms_body = array(
    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message,
);
  



// Step 6: instantiate a new IRTEEL SMS request


$client = new IRTEELSMS($url,$token,$sms_body);

/*$client->setUrl($url);
$client->setToken($token);
$client->setSmsBody($sms_body);*/

// Step 7: Send SMS
$response = $client->sms_send();



		print_r($response);


		// Get Response
		$response=json_decode($response);

		// Display a confirmation message on the screen
		echo 'Message: '.$response->message;


//Step 7: View an sms

$uid='';
//$view_sms=$client->sms_view($uid);


//Step 8: View all sms


$view_all_sms=$client->sms_views();

//Step 9: Get sms unit

$check_balance=$client->sms_balance();

//Step 10: Get profile

$view_profile=$client->profile();