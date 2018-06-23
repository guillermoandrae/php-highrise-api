<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use Guillermoandrae\Highrise\Client\Client;

$subdomain = ''; // add your subdomain here
$token = ''; // add your token

$client = new Client($subdomain, $token);
$results = $client->cases()->findOpen();
var_dump($results);
