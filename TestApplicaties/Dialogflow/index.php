<?php

namespace Google\Cloud\Samples\Dialogflow;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Detection;

require __DIR__.'/vendor/autoload.php';
include '../intents.php';

$resultCustom = array();
function detect_intent_texts($projectId, $text, $sessionId, $languageCode = 'en-US')
{
    // new session
    $test = array('credentials' => 'client-secret.json');
    $sessionsClient = new SessionsClient($test);
    $session = $sessionsClient->sessionName($projectId, $sessionId ?: uniqid());

    // create text input
    $textInput = new TextInput();
    $textInput->setText($text);
    $textInput->setLanguageCode($languageCode);

    // create query input
    $queryInput = new QueryInput();
    $queryInput->setText($textInput);

    // get response and relevant info
    $response = $sessionsClient->detectIntent($session, $queryInput);
    $queryResult = $response->getQueryResult();
    $queryText = $queryResult->getQueryText();
    $intent = $queryResult->getIntent();
    if($intent == null){
        return null;
    }
    $displayName = $intent->getDisplayName();
    $confidence = $queryResult->getIntentDetectionConfidence();
    $fulfilmentText = $queryResult->getFulfillmentText();

    // output relevant info

    //add to csv file for further testing


    $list =  [$text, $displayName, $confidence];
    $sessionsClient->close();
    return $list;
}

$ClassDetection = new Detection();
$array = $ClassDetection->getMessages2();

//$time_pre = microtime(true);
for($i=0;$i < count($array); $i++){
    $resultCustom[$i]['query'] = null;
    $resultCustom[$i]['intent'] = "empty_string";
    $resultCustom[$i]['score'] = null;
    if(strlen($array[$i]["text"]) == 0){
        //add to csv file it's empty line
        $resultCustom[$i]['intent'] = "empty_string";
    }
    elseif(strlen($array[$i]["text"]) <= 256){
        $list= detect_intent_texts('conversational-internship',$array[$i]["text"],$i);
        if($list == null){
            $resultCustom[$i]['intent'] = "result_not_found";
        }
        else {
            $resultCustom[$i]['query'] = $list[0];
            $resultCustom[$i]['intent'] = $list[1];
            $resultCustom[$i]['score'] = $list[2];
        }

    }
    else {
        //add to csv file to many characters for 1 line
        $resultCustom[$i]['intent'] = "string_to_long";;
    }
    sleep(1);
    echo $i;
}
//$time_post = microtime(true);
//$exec_time = $time_post - $time_pre;
//print("\n");
//print($exec_time);
$ClassDetection->toJson($resultCustom,"dialogflowDataset2");


