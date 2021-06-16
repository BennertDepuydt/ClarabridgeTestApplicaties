<?php

require 'vendor/autoload.php';
include '../intents.php';

$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.eu-de.assistant.watson.cloud.ibm.com'
]);
$response= $client->request('GET', '/instances/{key}/v1/workspaces?version=2020-04-01', [
    'auth' => [
        'apikey',
        '{key}'
    ],
    'verify' => "cacert.pem",
]);

$array = json_decode($response->getBody()->getContents(), true);
$workspace_id = $array["workspaces"][0]["workspace_id"];

$ClassIntents = new Intents();
$intents = $ClassIntents->getIntents();


for($i=58;$i < count($intents); $i++){
    CreateIntent($intents[$i]["intent"],$client, $workspace_id);
    for($j=0;$j < count($intents[$i]["example_phrases"]);$j++){
        addExamples($intents[$i]["intent"], $intents[$i]["example_phrases"][$j], $client, $workspace_id);
    }
    sleep(140);
}

function createIntent($intent, $client, $workspace_id){
    $responseCreateIntent = $client->request('POST', '/instances/{key}/v1/workspaces/46d6a301-2cab-4176-b771-8f6bf6c54831/intents?version=2020-04-01', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => array(
            'intent'=> $intent,
        ),
        'auth' => [
            'apikey',
            '{key}'
        ],
        'verify' => "cacert.pem",
    ]);
    echo $responseCreateIntent->getBody();
    return null;
}

function addExamples($intent, $example, $client, $workspace_id){
    $replace = array("\n", '\'', '/');
    $example = str_replace($replace, "", $example);
$responseCreateIntent = $client->request('POST', '/instances/{key}/v1/workspaces/46d6a301-2cab-4176-b771-8f6bf6c54831/intents/'. $intent .'/examples?version=2020-04-01', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'json' => array(
        'text'=> $example,
    ),
    'auth' => [
        'apikey',
        '{key}'
    ],
    'verify' => "cacert.pem",
]);
    echo $responseCreateIntent->getBody();
    return null;
}
//create intent
