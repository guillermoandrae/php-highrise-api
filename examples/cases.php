<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

$subdomain = 'gui6';
$token = '80d0065571d313f881bc4c615bf30093';
$client = new \Guillermoandrae\Highrise\Client\Client($subdomain, $token);
$results = $client->cases()->search();
var_dump($results);
