<?php
require 'vendor/autoload.php';

include '../intents.php';



$client = new GuzzleHttp\Client([
    'base_uri' => 'https://api.eu-de.assistant.watson.cloud.ibm.com'
]);
//get workspace_id
$response= $client->request('GET', '/instances/{key}/v1/workspaces?version=2020-04-01', [
    'auth' => [
        'apikey',
        '{key}'
    ],
    'verify' => "cacert.pem",
]);


$array = json_decode($response->getBody()->getContents(), true);

//$workspace_id = $array["workspaces"][0]["workspace_id"];
$workspace_id = "id";
$ClassDetection = new Detection();
$array = $ClassDetection->getMessages2();

$resultCustom = array();

//$time_pre = microtime(true);
for($i=0;$i < count($array); $i++){
    $replace = array("\n", '\'', '/');
    $array[$i]['text'] = str_replace($replace, "", $array[$i]['text']);
    $resultCustom[$i]['intent'] = "empty_string";;
    $query = remove_emoji($array[$i]['text']);
    $input["text"] = $query;
    $resultCustom[$i]['query'] = $query;
    $resultCustom[$i]['score'] = null;
    if(strlen($query) == 0){
        $resultCustom[$i]['intent'] = "empty_string";;
    }
    elseif(strlen($query) > 514){
        $resultCustom[$i]['intent'] = "string_to_long";
    }
    else {
        $guzzle = detectIntent($input, $client, $workspace_id);
        $jsonArray = json_decode($guzzle->getContents(), true);
        if($jsonArray['intents'] != null){
            $resultCustom[$i]['intent'] = $jsonArray['intents'][0]['intent'];
            $resultCustom[$i]['score'] = $jsonArray['intents'][0]['confidence'];
            $resultCustom[$i]['query'] = $query;
        }
        else {
            $resultCustom[$i]['intent'] = "result_not_found";
        }
    }
    echo $i;
    sleep(1);

}
//$time_post = microtime(true);
//$exec_time = $time_post - $time_pre;
//print("\n");
//print($exec_time);
$ClassDetection->toJson($resultCustom,"ibmDataset2");

function detectIntent($input, $client, $workspace_id){
    $responseCreateIntent = $client->request('POST', '/instances/{key}/v1/workspaces/'. $workspace_id . '/message?version=2020-04-01', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => array(
            'input'=> $input,
        ),
        'auth' => [
            'apikey',
            '{key}'
        ],
        'verify' => "cacert.pem",
    ]);
    return $responseCreateIntent->getBody();
}
function remove_emoji($string) {

    // Match Emoticons
    $regex_emoticons = '/[\x{1F600}-\x{1F64F}]/u';
    $clear_string = preg_replace($regex_emoticons, '', $string);

    // Match Miscellaneous Symbols and Pictographs
    $regex_symbols = '/[\x{1F300}-\x{1F5FF}]/u';
    $clear_string = preg_replace($regex_symbols, '', $clear_string);

    // Match Transport And Map Symbols
    $regex_transport = '/[\x{1F680}-\x{1F6FF}]/u';
    $clear_string = preg_replace($regex_transport, '', $clear_string);

    // Match Miscellaneous Symbols
    $regex_misc = '/[\x{2600}-\x{26FF}]/u';
    $clear_string = preg_replace($regex_misc, '', $clear_string);

    // Match Dingbats
    $regex_dingbats = '/[\x{2700}-\x{27BF}]/u';
    $clear_string = preg_replace($regex_dingbats, '', $clear_string);

    return $clear_string;
}


