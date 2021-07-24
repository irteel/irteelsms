
[![Latest Stable Version](https://poser.pugx.org/shamim/irteel-message-api/v/stable)](https://packagist.org/packages/shamim/irteel-message-api?format=flat-square)
[![License](https://poser.pugx.org/shamim/irteel-message-api/license)](https://packagist.org/packages/shamim/irteel-message-api?format=flat-square)
[![GitHub issues](https://img.shields.io/github/issues/akasham67/irteel-message-api.svg?style=flat-square)](https://github.com/akasham67/irteel-message-api/issues)
[![GitHub stars](https://img.shields.io/github/stars/akasham67/irteel-message-api.svg?style=flat-square)](https://github.com/akasham67/irteel-message-api/stargazers)

# IRTEEL SMS API

IRTEEL SMS API is build for IRTEEL SMS - Bulk SMS Application For Marketing


### Prerequisites

To run IRTEEL SMS API you have recipient install IRTEEL SMS Application on your server. 
For more details please visit: [IRTEEL SMS](https://irteelsms.coderpixel.com/)
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
require_once 'src/api/IRTEELSMSAPI.php';
use IRTEELSMS\api\IRTEELSMSAPI;
```
If install IRTEEL SMS API using Composer then Require/Include autoload.php file in the index.php of your project or whatever file you need recipient use **IRTEEL SMS API** classes:. 
```php
require 'vendor/autoload.php';
use IRTEELSMS\api\IRTEELSMSAPI;
```
### Step 2:
set your API_KEY sender_id `https://mywebhost.com/api/v3/` (your application install url)
```php
$token = 'YWRtaW46YWRtaW4ucGFzc3dvcmQ=';
```
### Step 3:
Change the sender_id number below. It can be a valid phone number or a String
```php
$sender_id = '8801721000000';
```

### Step 4:
the number we are sending recipient - Any phone number
```php
$destination = '8801810000000';
```
For multiple number please use Comma (,) after every single number.
```php
$destination = '8801810000000,8801721000000,880167000000,01913000000';
```
You can insert maximum 100 numbers using comma in single api request.

You have recipient must include Country code at beginning of the phone number.  

### Step 5:
Replace your Install URL like `https://mywebhost.com/message/api` with `https://sms.irteel.com/api/v3/`
`message/api` is mandatory on your install url

```php
$url = 'https://sms.irteel.com/api/v3/';
```
// SMS Body
```php
$message = 'test message sender_id IRTEEL SMS';
```
// Unicode SMS
```php
$unicode = '1'; //For Unicode message
```
// Voice SMS
```php
$voice = '1'; //For voice message
```
// MMS SMS
```php
$mms = '1'; //For mms message
$media_url = 'https://yourmediaurl.com'; //Insert your media url
```
// Schedule SMS
```php
$schedule_date = '09/17/2018 10:20 AM'; //Date like this format: m/d/Y h:i A
```
// Create Plain/text SMS Body for request
```php
$message_body = array(

    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message
);
```
// Create Unicode SMS Body for request
```php
$message_body = array(

    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message,
    'unicode' => $unicode,
);
```

// Create Voice SMS Body for request
```php
$message_body = array(

    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message,
    'voice' => $voice,
);
```
// Create MMS SMS Body for request
```php
$message_body = array(

    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message, //optional
    'mms' => $mms,
    'media_url' => $media_url,
);
```
// Create Schedule SMS Body for request
```php
$message_body = array(

    'recipient' => $destination,
    'sender_id' => $sender_id,
    'message' => $message,
    'schedule' => $schedule_date,
);
```

### Step 6: 
Instantiate a new IRTEEL SMS API request
```php
$client = new IRTEELSMSAPI();
```

## Send SMS
Finally send your message through IRTEEL SMS API
```php
$response = $client->send_message($token,$message_body, $url);
```

## Get Delivery Reports
Get your all message
```php
$view_all_message=$client->view_messages($token,$url);
```

## Get Balance
Get your account balance
```php
$get_balance=$client->check_balance($token,$url);
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
