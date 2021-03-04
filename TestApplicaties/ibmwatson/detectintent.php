<?php


require 'vendor/autoload.php';

include '../intents.php';

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

$ClassDetection = new Detection();
$array = $ClassDetection->getMessages();

$resultCustom = array();
for($i=0;$i < 2; $i++){
        $replace = array("\n", '\'', '/');
        $array[$i]['title'] = str_replace($replace, "", $array[$i]['title']);
        $input["text"] = $array[$i]['title'];
        $resultCustom[$i]['intent'] = "empty_string";;
        $resultCustom[$i]['query'] = null;
        $resultCustom[$i]['score'] = null;
        if(strlen($array[$i]['title']) == 0){
            $resultCustom[$i]['intent'] = "empty_string";;
        }
        elseif(strlen($array[$i]['title']) > 514){
            $resultCustom[$i]['intent'] = "string_to_long";
        }
        else {
            $guzzle = detectIntent($input, $client, $workspace_id);
            $jsonArray = json_decode($guzzle->getContents(), true);
            if($jsonArray['intents'] != null){
                $resultCustom[$i]['intent'] = $jsonArray['intents'][0]['intent'];
                $resultCustom[$i]['score'] = $jsonArray['intents'][0]['confidence'];
                $resultCustom[$i]['query'] = $array[$i]['title'];
            }
            else {
                $resultCustom[$i]['intent'] = "empty_string";;

            }

        }

    sleep(1);

}
$ClassDetection->toJson($resultCustom,"ibm");

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


