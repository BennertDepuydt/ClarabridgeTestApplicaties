<?php

require 'vendor/autoload.php';
include '../intents.php';

use Aws\Credentials\Credentials;


$credentials = new Credentials('{key}', '{key}');

$options = [
    'region'            => 'us-west-2',
    'version'           => 'latest',
    'credentials' => $credentials,
    'http'    => [
        'verify' => 'cacert.pem'
    ]
];
//$lex_client = new Aws\LexRunTimeService\LexRuntimeServiceClient($options);

$lex_client = new Aws\LexModelsV2\LexModelsV2Client($options);
$lex_client2 = new Aws\LexRuntimeV2\LexRuntimeV2Client($options);



$ClassDetection = new Detection();
$array = $ClassDetection->getMessages2();
$resultCustom = array();
//$time_pre = microtime(true);
for($i=0;$i < count($array); $i++){
    $query = $array[$i]['text'];
    $resultCustom[$i]['query'] = null;
    $resultCustom[$i]['intent'] = 'empty_string';
    $resultCustom[$i]['score'] = null;
    //$resultCustom[$i]['alternativeIntents'] = null;
    if( strlen($array[$i]['text']) == 0){
        $resultCustom[$i]['query'] = $query;
        $resultCustom[$i]['intent'] = 'empty_string';
        //$resultCustom[$i]['alternativeIntents'] = null;
    }
    elseif(strlen($array[$i]['text']) >= 1024){
        $resultCustom[$i]['query'] = $query;
        $resultCustom[$i]['intent'] = 'string_to_long';
        //$resultCustom[$i]['alternativeIntents'] = null;
    }
    else {
        $result = $lex_client2->recognizeText([
            'botId' => "{key}",
            'botAliasId' => 'test',
            'sessionId' => "184189737041",
            'localeId' => 'en_US',
            'text' => $query,

        ]);
        $resultsarray = $result->get('interpretations');
        $intentName = $resultsarray[0]["intent"]["name"];
        $nluIntentConfidence = $resultsarray[0]["nluConfidence"]["score"];
        $resultCustom[$i]['query'] = $array[$i]['text'];
        $resultCustom[$i]['intent'] = $intentName;
        $resultCustom[$i]['score'] = $nluIntentConfidence;
    }
    sleep(1);
    echo $i;
}
//$time_post = microtime(true);
//$exec_time = $time_post - $time_pre;
//print("\n");
//print($exec_time);
$ClassDetection->toJson($resultCustom,"amazonDataset2");





