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
    printf('Session path: %s' . PHP_EOL, $session);

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
    $displayName = $intent->getDisplayName();
    $confidence = $queryResult->getIntentDetectionConfidence();
    $fulfilmentText = $queryResult->getFulfillmentText();

    // output relevant info

    //add to csv file for further testing
    if(empty($displayName)){
        $displayName="small_talk";
    }

    $list =  [$text, $displayName, $confidence];
    $sessionsClient->close();
    return $list;
}

$ClassDetection = new Detection();
$array = $ClassDetection->getMessages();


for($i=0;$i < 2; $i++){
    $resultCustom[$i]['query'] = null;
    $resultCustom[$i]['intent'] = "empty_string";
    $resultCustom[$i]['score'] = null;
    if(strlen($array[$i]["title"]) == 0){
        //add to csv file it's empty line
        $resultCustom[$i]['intent'] = "empty_string";
    }
    elseif(strlen($array[$i]["title"]) <= 256){
        $list= detect_intent_texts('conversational-internship',$array[$i]["title"],$i*1000);
        $resultCustom[$i]['query'] = $list[0];;
        $resultCustom[$i]['intent'] = $list[1];
        $resultCustom[$i]['score'] = $list[2];
    }
    else {
        //add to csv file to many characters for 1 line
        $resultCustom[$i]['intent'] = "string_to_long";;
    }
    sleep(1);
}
$ClassDetection->toJson($resultCustom,"dialogflow");


