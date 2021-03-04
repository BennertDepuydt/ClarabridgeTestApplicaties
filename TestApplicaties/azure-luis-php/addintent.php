<?php
include __DIR__."../intents.php";

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// **********************************************
// *** Update or verify the following values. ***
// **********************************************

// The ID of a public IoT LUIS app that recognizes intents for turning on and off lights
$appId = "";

// Replace with your endpoint key.
// You can use the authoring key instead of the endpoint key.
// The authoring key allows 1000 endpoint queries a month.
$endpointKey = "";



// The endpoint URI below is for the West US region.
// If your subscription is in a different region, update accordingly.
$endpoint = "";
$endpoint2 = "";



// The LUIS query term
function CreateIntent($url,$key, $name) {
    // Prepare HTTP request
    // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
    // http://php.net/manual/en/function.stream-context-create.php


    $postData = array(
        'name' => $name
    );

    $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
    $options = array ( 'http' => array (
        'method' => 'POST',
        'header' => $headers,
        'ignore_errors' => true,
        'content' => http_build_query($postData),

    ));
    print($url);

    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);

    return file_get_contents($url, false, $context);

}
function createExamples($url,$key, $name, $text){
    $postData = array(
        'text' => $text,
        'intentName' => $name,
    );

    $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
    $options = array ( 'http' => array (
        'method' => 'POST',
        'header' => $headers,
        'ignore_errors' => true,
        'content' => http_build_query($postData),

    ));
     print($url);

    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);

    return file_get_contents($url, false, $context);

}

// check length of key
if (strlen($endpointKey) == 32) {
    $ClassIntents = new Intents();
    $intents = $ClassIntents->getIntents();
    for($i=0;$i < count($intents); $i++){
        $json = CreateIntent($endpoint, $endpointKey,$intents[$i]["intent"]);
        print(json_encode(json_decode($json), JSON_PRETTY_PRINT));
        print("\n");
        for($j=0;$j < count($intents[$i]["example_phrases"]); $j++){
            $json2 = createExamples($endpoint2, $endpointKey, $intents[$i]["intent"], $intents[$i]["example_phrases"][$j]);
            print(json_encode(json_decode($json2), JSON_PRETTY_PRINT));
            print("\n");
        }
    }

} else {

    print("Invalid LUIS key!\n");
    print("Please paste yours into the source code.\n");

}


