<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.eu-de.assistant.watson.cloud.ibm.com'
]);

//check bots for the workspace_id
$response= $client->request('GET', '/instances/{{key}}/v1//workspaces?version=2020-04-01', [
    'auth' => [
        'apikey',
        '{{apikey}}'
    ],
    'verify' => FALSE,
]);

$array = json_decode($response->getBody()->getContents(), true);

$workspace_id = $array["workspaces"][0]["workspace_id"];

$ClassIntents = new Intents();
$intents = $ClassIntents->getIntents();


for($i=0;$i < count($intents); $i++){
    CreateIntent($intents[$i]["intent"],$client, $workspace_id);
    for($j=0;$j < count($intents[$i]["example_phrases"]);$j++){
        addExamples($intents[$i]["intent"], $intents[$i]["example_phrases"][$j], $client, $workspace_id);
    }

}

function createIntent($intent, $client, $workspace_id){

    $responseCreateIntent = $client->request('POST', '/instances/{{key}}/v1/workspaces/'. $workspace_id . '/intents?version=2020-04-01', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => array(
            'intent'=> $intent,
        ),
        'auth' => [
            'apikey',
            '{{apikey}}'
        ],
        'verify' => FALSE,

    ]);

    echo $responseCreateIntent->getBody();
    return null;
}

function addExamples($intent, $example, $client, $workspace_id){

$responseCreateIntent = $client->request('POST', '/instances/{{key}}/v1/workspaces/'. $workspace_id . '/intents/'. $intent .'/examples?version=2020-04-01', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
    'json' => array(
        'text'=> $example,
    ),
    'auth' => [
        'apikey',
        '{{apikey}}'
    ],
    'verify' => FALSE,

]);

    echo $responseCreateIntent->getBody();
    return null;
}
//create intent
