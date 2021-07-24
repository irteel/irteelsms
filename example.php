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

require_once 'src/api/IRTEELSMSAPI.php';
use IRTEELSMS\api\IRTEELSMSAPI;


// Step 2: set your Token from https://mywebhost.com/developers

$token = '3|QuHFBjqd8Hyatnd1vthoDy3FJvMRKRDuufzj';


// Step 3: Change the from number below. It can be a valid phone number or a String
$sender_id = 'irteel';

// Step 4: the number we are sending to - Any phone number
$destination = '237695601314';

// Step 5: Replace your Install URL like https://mywebhost.com/sms/api with https://sms.irteel.com/api/v3
// <api/v3> is mandatory.

$url = 'https://sms.irteel.com/api/v3/';

// the sms body
$message = 'test message from irteel SMS';


// Create Message Body for request
$sms_body = array(
    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message,
);

// Step 6: instantiate a new IRTEEL SMS API request
$client = new IRTEELSMSAPI();

// Step 7: Send SMS
$response = $client->send_sms($sms_body,$url,$token);

print_r($response);


// Step 8: Get Response
$response=json_decode($response);

// Display a confirmation message on the screen
echo 'Message: '.$response->message;


//Step 9: View an sms

$uid='';
//$view_sms=view_sms($url,$token,$uid);


//Step 10: View all sms


$view_all_sms=view_smss($url,$token);

//Step 11: Get sms unit

$check_balance=$client->check_balance($token,$url);

//Step 12: Get profile

$view_profile=$client->view_profile($token,$url);