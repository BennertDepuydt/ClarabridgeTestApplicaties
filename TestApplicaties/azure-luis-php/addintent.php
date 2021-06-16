<?php

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// **********************************************
// *** Update or verify the following values. ***
// **********************************************

// The ID of a public IoT LUIS app that recognizes intents for turning on and off lights
error_reporting(0);

include '../intents.php';
$appId = "{key}";

// Replace with your endpoint key.
// You can use the authoring key instead of the endpoint key.
// The authoring key allows 1000 endpoint queries a month.
$endpointKey = "{key}";



// The endpoint URI below is for the West US region.
// If your subscription is in a different region, update accordingly.
$endpoint = "https://westeurope.api.cognitive.microsoft.com/luis/authoring/v3.0-preview/apps/{key}/versions/0.1/intents";
$endpoint2 = "https://westeurope.api.cognitive.microsoft.com/luis/authoring/v3.0-preview/apps/{key}/versions/0.1/example";


// The LUIS query term
function CreateIntent($url,$key, $name) {
    $postData = array(
        'name' => $name
    );
    $headers = [
        "Ocp-Apim-Subscription-Key: $key\r\n",
    ];
    $options = array ( 'http' => array (
        'method' => 'POST',
        'header' => $headers,
        'ignore_errors' => true,
        'content' => http_build_query($postData),

    ));
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}
function createExamples($url,$key, $name, $text){
    $postData = array(
        'text' => $text,
        'intentName' => $name,
    );

    $headers = [
        "Ocp-Apim-Subscription-Key: $key\r\n",
    ];
    $options = array ( 'http' => array (
        'method' => 'POST',
        'header' => $headers,
        'ignore_errors' => true,
        'content' => http_build_query($postData),

    ));
    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);

}

// check length of key
if (strlen($endpointKey) == 32) {
    $ClassIntents = new Intents();
    $intents = $ClassIntents->getIntents();
    for($i=4;$i < count($intents); $i++){
        $json = CreateIntent($endpoint, $endpointKey,$intents[$i]["intent"]);
        for($j=0;$j < count($intents[$i]["example_phrases"]); $j++){
            $json2 = createExamples($endpoint2, $endpointKey, $intents[$i]["intent"], $intents[$i]["example_phrases"][$j]);
            sleep(1);
        }
        print($intents[$i]["intent"] . " created");
        print("\n");
        sleep(20);
    }

} else {

    print("Invalid LUIS key!\n");
    print("Please paste yours into the source code.\n");

}


