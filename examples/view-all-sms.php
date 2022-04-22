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



// Step 1: set your API_KEY from https://my.irteelsms.com/developers

$token = '3|39VVNH7w6pTaNEUgnTzpcX1iDsmnulcqFyMBv3TR';


// Step 2: Set url to https://my.irteelsms.com/api/v3/
// <api/v3> is mandatory.

$url = 'https://my.irteelsms.com/api/v3/';


// Step 3: instantiate a new IRTEEL SMS request


$client = new IRTEELSMS($url,$token,'');


//Step 4: View an sms

$view_sms=$client->sms_views();



	print_r($view_sms);


	// Get Response
	$response=json_decode($view_sms);

	// Display a confirmation message on the screen
	echo 'Message: '.$response->message;

