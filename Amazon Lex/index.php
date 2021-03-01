<?php

use Aws\Credentials\Credentials;

require 'vendor/autoload.php';



$credentials = new Credentials('', '');

$options = [
    'region'            => 'us-west-2',
    'version'           => 'latest',
    'debug' => true,
    'credentials' => $credentials,
    'http'    => [
        'verify' => 'cacert.pem'
    ]
];
$lex_client = new Aws\LexRunTimeService\LexRuntimeServiceClient($options);


$strJsonFileContents = file_get_contents("clarabridge.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);
$fp = fopen('results.json', 'a');
fwrite($fp, '[');
fclose($fp);

for($i=0;$i <= count($array) ; $i++){
    $resultCustom = array();
    if( strlen($array[$i]['title']) == 0){
        sleep(1);
        $resultCustom[0]['intent'] = 'empty_string';
        $resultCustom[0]['score'] = null;
        $resultCustom[0]['alternativeIntents'] = null;
    }
    elseif(strlen($array[$i]['title']) >= 1024){
        $resultCustom[0]['intent'] = 'string_to_long';
        $resultCustom[0]['score'] = null;
        $resultCustom[0]['alternativeIntents'] = null;
    }
    else {
        $result = $lex_client->postText([
            "inputText" => $array[$i]['title'],
            "botName" => "TestBennert",
            "botAlias" => "test",
            'userId' => ""
        ]);
        echo $result;
        $intentName =  $result->get('intentName');
        $nluIntentConfidence =  $result->get('nluIntentConfidence');
        $alternativeIntents = $result->get("alternativeIntents");
        $resultCustom[0]['intent'] = $intentName;
        $resultCustom[0]['score'] = $nluIntentConfidence['score'];
        $resultCustom[0]['alternativeIntents'] = $alternativeIntents;
    }
    $resultJson = json_encode($resultCustom);
    $resultJson = substr($resultJson, 1, -1);

    $fp = fopen('results.json', 'a');
    fwrite($fp, json_encode(json_decode($resultJson), JSON_PRETTY_PRINT));
    fwrite($fp, ',');
    fclose($fp);
    sleep(1);
    print($i);

}
$fp = fopen('results.json', 'a');
fwrite($fp, ']');
fclose($fp);




