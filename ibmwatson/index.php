<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.eu-de.assistant.watson.cloud.ibm.com'
]);

//check bots for the workspace_id
$response= $client->request('GET', '/instances/((key}}/v1/workspaces?version=2020-04-01', [
    'auth' => [
        'apikey',
        '{{apikey}}'
    ],
    'verify' => FALSE,
]);

$array = json_decode($response->getBody()->getContents(), true);

$workspace_id = $array["workspaces"][0]["workspace_id"];


//create intent
$responseCreateIntent = $client->request('POST', '/instances/{{key}}/v1/workspaces/'. $workspace_id . '/intents?version=2020-04-01', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'json' => array(
        'intent'=> 'test',
    ),
    'auth' => [
        'apikey',
        '{{apikey}}'
    ],
    'verify' => FALSE,

]);

echo $responseCreateIntent->getBody();