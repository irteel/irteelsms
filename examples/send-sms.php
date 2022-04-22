<?php

/* Send an SMS using IRTEEL SMS. You can run this file 3 different ways:
 *
 * 1. Save it as example.php and at the command line, run
 *         php example.php
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

require_once '../src/IRTEELSMS.php';


use IRTEELSMS\IRTEELSMS;



// Step 2: set your Token from https://my.irteelsms.com/developers

$token = '3|39VVNH7w6pTaNEUgnTzpcX1iDsmnulcqFyMBv3TR';


// Step 3: Change the from number below. It can be a valid phone number or a String
$sender_id = 'irteel';

// Step 4: the number we are sending to - Any phone number
$recipient = '237695601314';

// Step 5: Set url to https://my.irteelsms.com/api/v3
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



// Step 6: instantiate a new IRTEEL SMS request


$client = new IRTEELSMS($url,$token,$sms_body);


// Step 7: Send SMS
$response = $client->sms_send();



	//print_r($response);


	// Get Response
	$response=json_decode($response);

	// Display a confirmation message on the screen
	//echo 'Message: '.$response->message;


