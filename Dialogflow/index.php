<?php

namespace Google\Cloud\Samples\Dialogflow;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;

require __DIR__.'/vendor/autoload.php';



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
    print(str_repeat("=", 20) . PHP_EOL);
    printf('Query text: %s' . PHP_EOL, $queryText);
    printf('Detected intent: %s (confidence: %f)' . PHP_EOL, $displayName,
        $confidence);
    print(PHP_EOL);
    printf('Fulfilment text: %s' . PHP_EOL, $fulfilmentText);


    //add to csv file for further testing
    if(empty($displayName)){
        $displayName="small_talk";
    }

    $list =  [(string)$text, (string)$displayName, (string)$confidence];

    $fp = fopen('results.csv', 'a');
    fputcsv($fp, $list, ';');
    fclose($fp);

    $sessionsClient->close();
}

$strJsonFileContents = file_get_contents("clarabridge.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);

for($i=0;$i < count($array); $i++){
    if(strlen($array[$i]["title"]) == 0){
        //add to csv file it's empty line
        $list =  ["NULL", "intent_empty" , 0];
        $fp = fopen('results.csv', 'a');
        fputcsv($fp, $list, ';');
        fclose($fp);
    }
    elseif(strlen($array[$i]["title"]) <= 256){
        detect_intent_texts('conversational-internship',$array[$i]["title"],$i*1000);
    }
    else {
        //add to csv file to many characters for 1 line
        $list =  ["NULL", "intent_to_big" , 0];
        $fp = fopen('results.csv', 'a');
        fputcsv($fp, $list, ';');
        fclose($fp);
    }
    sleep(1);
}


