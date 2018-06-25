# PHP Highrise API Client
[![Travis](https://img.shields.io/travis/guillermoandrae/php-highrise-api.svg?style=flat-square)](https://travis-ci.org/guillermoandrae/php-highrise-api) [![Scrutinizer](https://img.shields.io/scrutinizer/g/guillermoandrae/php-highrise-api.svg?style=flat-square)](https://scrutinizer-ci.com/g/guillermoandrae/php-highrise-api/) [![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/guillermoandrae/php-highrise-api.svg?style=flat-square)](https://scrutinizer-ci.com/g/guillermoandrae/php-highrise-api/) [![PHP from Travis config](https://img.shields.io/travis/php-v/guillermoandrae/php-highrise-api.svg?style=flat-square)](https://travis-ci.org/guillermoandrae/php-highrise-api)

See the [Highrise API documentation](https://github.com/basecamp/highrise-api) for information about specific resources.

## Installation
Do this, then relax:
```
composer require guillermoandrae/php-highrise-api
```

## Getting Started
To use the client, instantiate it and use either the `resource()` method or one of the many aliases available through the `__call()` method. For example, to get a list of all of the users associated with your account, you can do the following:

```php
use Guillermoandrae\Highrise\Client\Client;

$subdomain = 'xxxxxx'; // add your subdomain here
$token = '1234567890'; // add your token

$client = new Client($subdomain, $token);
$users = $client->users()->findAll();
var_dump($users);
```

To see which aliases are available, check the [docblock of the `Client` class](https://github.com/guillermoandrae/php-highrise-api/blob/master/src/Client/Client.php).

## Testing
Run the following command to make sure you don't ruin the code coverage percentage:
```
composer check-coverage
```

Run the following command to make sure your code is appropriately styled:
```
composer check-style
```

Run the following command to invoke both of the above commands easily:
```
composer test
```
