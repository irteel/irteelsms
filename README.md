
[![Latest Stable Version](https://poser.pugx.org/shamim/irteel-message-api/v/stable)](https://packagist.org/packages/shamim/irteel-message-api?format=flat-square)
[![License](https://poser.pugx.org/shamim/irteel-message-api/license)](https://packagist.org/packages/shamim/irteel-message-api?format=flat-square)
[![GitHub issues](https://img.shields.io/github/issues/akasham67/irteel-message-api.svg?style=flat-square)](https://github.com/akasham67/irteel-message-api/issues)
[![GitHub stars](https://img.shields.io/github/stars/akasham67/irteel-message-api.svg?style=flat-square)](https://github.com/akasham67/irteel-message-api/stargazers)

# IRTEEL SMS API

IRTEEL SMS API is build for IRTEEL SMS - Bulk SMS Application For Marketing


### Prerequisites

To run IRTEEL SMS API you have recipient install IRTEEL SMS Application on your server. 
For more details please visit: [IRTEEL SMS](https://my.irteelsms.com/developers/docs)
```
php >=5.6
IRTEEL SMS - Bulk SMS Application For Markting
```

### Installing
Via Composer
```
composer require irteel/irteelsms 
```

And Via Bash

```
git clone https://github.com/irteel/irteelsms.git
```

## Usage


 ### Step 1:
If install IRTEEL SMS API using Git Clone then load your IRTEEL SMS API Class file and Use namespace. 
```php
require_once 'src/Api/IRTEELSMSAPI.php';
use IRTEELSMS\IRTEELSMSAPI;
```
If install IRTEEL SMS API using Composer then Require/Include autoload.php file in the index.php of your project or whatever file you need recipient use **IRTEEL SMS API** classes:. 
```php
require 'vendor/autoload.php';
use IRTEELSMS\IRTEELSMSAPI;
```
### Step 2: set your API_KEY from https://my.irteelsms.com/developers

```php
$token = '3|39VVNH7w6pTaNEUgnTzpcX1iDsmnulcqFyMBv3TR';
```
### Step 3:
Change the sender_id number below. It can be a valid phone number or a String
```php
$sender_id = 'irteelSMS';
```

### Step 4:
the number we are sending recipient - Any phone number
```php
$recipient = '237695601314';
```
For multiple number please use Comma (,) after every single number.
```php
$recipient = '237695601314,8801721000000,880167000000,01913000000';
```
You can insert maximum 100 numbers using comma in single api request.

You have recipient must include Country code at beginning of the phone number.  

### Step 5:
Set url to https://my.irteelsms.com/api/v3
<api/v3> is mandatory. is mandatory on your install url

```php
$url = 'https://my.irteelsms.com/api/v3';
```
// SMS Body
```php
$message = 'test message sender_id IRTEEL SMS V3';
```

```php
The sms type (Plain,Voice,MMS,Wathsapp)
// Plain text SMS
$type = 'plain'; //For Plain text message
```

// Schedule SMS
```php
$schedule_time='2021-12-20 07:00'; //Time like this format: y-m/d h:mm

```
// Create Plain/text SMS Body for request
```php
$message_body = array(

    'recipient' => $recipient,
    'sender_id' => $sender_id,
    'message' => $message,
	    'type' => 'plain',
);
```

// Create Voice SMS Body for request
```php
$message_body = array(

    'recipient' => $recipient,
    'sender_id' => $sender_id,
    'message' => $message,
    'type' => 'voice',
);
```
// Create MMS SMS Body for request
```php
$message_body = array(

    'recipient' => $recipient,
    'sender_id' => $sender_id,
    'message' => $message, //optional
    'type' => 'mms',
    'media_url'='https://via.placeholder.com/150.jpg'
);
```
// Create Whathsapp SMS Body for request
```php
$message_body = array(

    'recipient' => $recipient,
    'sender_id' => $sender_id,
    'message' => $message,
    'type' => 'Whathsapp',
);
```
// Create Schedule SMS Body for request
```php
$message_body = array(
    'recipient' => $recipient,
    'sender_id' => $sender_id,
    'message' => $message,
	'type' => $type,
    'schedule_time' => $schedule_time
);
```

### Step 6: 
Instantiate a new IRTEEL SMS instance send sms request 
```php
$client = new IRTEELSMS($url,$message_body,$token);
```

## Send SMS
Finally send your message through IRTEEL SMS API
```php
$response = $client->sms_send();
```

### Step 6: 
Instantiate a new IRTEEL SMS instance get report request 
```php
$client = new IRTEELSMS($url,'',$token);
```

## Get Delivery Reports
Get your all message
```php
$view_all_message=$client->sms_views();
```

## Get Balance
Get your account balance
```php
$get_balance=$client->sms_balance();
```
## Response
IRTEEL SMS API return response with `json` format, like:

```json
{"code":"ok","message":"Successfully Send"}
```

## Status Code

| Status | Message |
| --- | --- |
| `ok` | Successfully Send |
| `100` | Bad gateway requested |
| `101` | Wrong action |
| `102` | Authentication failed |
| `103` | Invalid phone number |
| `104` | Phone coverage not active |
| `105` | Insufficient balance |
| `106` | Invalid Sender ID |
| `107` | Invalid SMS Type |
| `108` | SMS Gateway not active |
| `109` | Invalid Schedule Time |
| `110` | Media url required |
| `111` | SMS contain spam word. Wait for approval |

## Authors

* **ing: Cyrille Brice Bidongo Bekono** - *Initial work* - [irteel](https://github.com/irteel/irteelsms)
