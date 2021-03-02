<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.eu-de.assistant.watson.cloud.ibm.com'
]);

//check bots for the workspace_id
$response= $client->request('GET', '/instances/{{key}}/v1/workspaces?version=2020-04-01', [
    'auth' => [
        'apikey',
        '{{apikey}}'
    ],
    'verify' => FALSE,
]);

$array = json_decode($response->getBody()->getContents(), true);

$workspace_id = $array["workspaces"][0]["workspace_id"];

$strJsonFileContents = file_get_contents("clarabridge.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);


for($i=443;$i < count($array); $i++){
        $replace = array("\n", '\'', '/');
        $array[$i]['title'] = str_replace($replace, "", $array[$i]['title']);
        $input["text"] = $array[$i]['title'];
        $intent = "empty";
        $confidence = "empty";
        $text = "empty";
        if(strlen($array[$i]['title']) == 0){
            $intent = "empty_string";
        }
        elseif(strlen($array[$i]['title']) > 514){
            $intent = "text_to_long";
        }
        else {
            $guzzle = detectIntent($input, $client, $workspace_id);
            $jsonArray = json_decode($guzzle->getContents(), true);
            if($jsonArray['intents'] != null){
                $intent = ($jsonArray['intents'][0]['intent']);
                $confidence = ($jsonArray['intents'][0]['confidence']);
                $text = ($jsonArray['input']['text']);
            }
            else {
                $intent = "no_intent_found";

            }

        }


    $list =  [(string)$text, (string)$intent, (string)$confidence];
    $fp = fopen('results.csv', 'a');
    fputcsv($fp, $list, ';');
    fclose($fp);
    var_dump($list);
    print($i);
    sleep(1);

}

function detectIntent($input, $client, $workspace_id){

    $responseCreateIntent = $client->request('POST', '/instances/{{key}}/v1/workspaces/'. $workspace_id . '/message?version=2020-04-01', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => array(
            'input'=> $input,
        ),
        'auth' => [
            'apikey',
            '{{apikey}}'
        ],
        'verify' => FALSE,

    ]);
    return $responseCreateIntent->getBody();
}


