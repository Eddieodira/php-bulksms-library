# PHP BulkSMS API Implementation for Hostpinnacle (Kenya)
This is a simple implementation of bulk sms for PHP for Hostpinnacle in Kenya. This library includes functionality to send single or batch messages.

## Composer Installation
You can install the package via composer:
```php
composer require eddieodira/bulksms:dev-main
```
## Registration
To use this library you need create an account with Hostpinnacle (https://www.hostpinnacle.co.ke). They will help to create account from which you will get the following credentials:

1. API End Point
2. User ID
3. Password
4. API Key
5. Sender ID

## Usage
Send a single message:

```php
use Eddieodira\Bulksms\Sender;
$configData = [
  'apiEndPoint' => 'xxxxxxxxxxxxxxxxxx',
  'userId' => 'xxxxxxxxxxxxxxxxx', 
  'password' => 'xxxxxxxxxxxxxxxx', 
  'apiKey' => 'xxxxxxxxxxxxxxxxxxxx',
  'senderId' => 'xxxxxxxxxxxxxxxxxxx',
];

$hostpinnacle = new Sender($configData);
$hostpinnacle->setSendMethod('quick');
$hostpinnacle->setPhone('2547xxxxxxxx'); //You can only use mobile phone numbers in the format: 254721000000 or +254721000000
$hostpinnacle->setMessage('Hello, I am just testing this applications');
$hostpinnacle->sendMessage();
echo $hostpinnacle->getResponse();
```

Send one message to more than one number:

```php
use Eddieodira\Bulksms\Sender;
$configData = [
  'apiEndPoint' => 'xxxxxxxxxxxxxxxxxx',
  'userId' => 'xxxxxxxxxxxxxxxxx', 
  'password' => 'xxxxxxxxxxxxxxxx', 
  'apiKey' => 'xxxxxxxxxxxxxxxxxxxx', //You can leave this blank: 'apiKey' => '' if you have the other credentials
  'senderId' => 'xxxxxxxxxxxxxxxxxxx',
];

$hostpinnacle = new Sender($configData);
$hostpinnacle->setSendMethod('quick');
$hostpinnacle->setPhone('25472xxxxxxx, 25475xxxxxxx, 25476xxxxxxx'); //You can only use mobile phone numbers in the format: 254721000000 or +254721000000
$hostpinnacle->setMessage('Hello, I am just testing this applications');
$hostpinnacle->sendMessage();
echo $hostpinnacle->getResponse();
```
## Schedule Bulk Messages

In order to send schedule messages, make sure call the method ```$hostpinnacle->setScheduleTime("2024-04-25 09:46:00"); ```, with date and time as the argument:

```php
use Eddieodira\Bulksms\Sender;
$configData = [
  'apiEndPoint' => 'xxxxxxxxxxxxxxxxxx',
  'userId' => 'xxxxxxxxxxxxxxxxx', 
  'password' => 'xxxxxxxxxxxxxxxx', 
  'apiKey' => 'xxxxxxxxxxxxxxxxxxxx', //You can leave this blank: 'apiKey' => '' if you have the other credentials
  'senderId' => 'xxxxxxxxxxxxxxxxxxx',
];

$hostpinnacle = new Sender($configData);
$hostpinnacle->setSendMethod('quick');
$hostpinnacle->setPhone('25472xxxxxxx, 25475xxxxxxx, 25476xxxxxxx'); //You can only use mobile phone numbers in the format: 254721000000 or +254721000000
$hostpinnacle->setScheduleTime("2024-04-25 09:46:00");
$hostpinnacle->setMessage('Hello, I am just testing this applications');
$hostpinnacle->sendMessage();
echo $hostpinnacle->getResponse();
```

# Contact
Please open an issue on GitHub if you have any problems or suggestions or you can contact me on +254715070754 or odingoeddie@gmail.com.

# License
I have released the contents of this repository under the [MIT license](http://opensource.org/licenses/MIT).
