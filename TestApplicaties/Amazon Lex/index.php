<?php

require 'vendor/autoload.php';
include '../intents.php';

use Aws\Credentials\Credentials;


$credentials = new Credentials('', '');

$options = [
    'region'            => 'us-west-2',
    'version'           => 'latest',
    'credentials' => $credentials,
    'http'    => [
        'verify' => 'cacert.pem'
    ]
];
$lex_client = new Aws\LexRunTimeService\LexRuntimeServiceClient($options);


$ClassDetection = new Detection();
$array = $ClassDetection->getMessages();
$resultCustom = array();
for($i=0;$i <= count($array) ; $i++){
    print(count($array));
    $query = $array[$i]['title'];
    $resultCustom[$i]['query'] = null;
    $resultCustom[$i]['intent'] = 'empty_string';
    $resultCustom[$i]['score'] = null;
    //$resultCustom[$i]['alternativeIntents'] = null;
    if( strlen($array[$i]['title']) == 0){
        $resultCustom[$i]['query'] = $query;
        $resultCustom[$i]['intent'] = 'empty_string';
        //$resultCustom[$i]['alternativeIntents'] = null;
    }
    elseif(strlen($array[$i]['title']) >= 1024){
        $resultCustom[$i]['query'] = $query;
        $resultCustom[$i]['intent'] = 'string_to_long';
        //$resultCustom[$i]['alternativeIntents'] = null;
    }
    else {
        $result = $lex_client->postText([
            "inputText" => $query,
            "botName" => "TestBennert",
            "botAlias" => "test",
            'userId' => ""
        ]);
        echo $result;
        $intentName =  $result->get('intentName');
        $nluIntentConfidence =  $result->get('nluIntentConfidence');
        //$alternativeIntents = $result->get("alternativeIntents");
        $resultCustom[$i]['query'] = $array[$i]['title'];
        $resultCustom[$i]['intent'] = $intentName;
        $resultCustom[$i]['score'] = $nluIntentConfidence['score'];
        //$resultCustom[$i]['alternativeIntents'] = $alternativeIntents;
    }

    sleep(1);
    print($i);
}
$ClassDetection->toJson($resultCustom,"amazon");




