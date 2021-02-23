<?php

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

// The LUIS query term
$term = "hi";

https://testsbennert.cognitiveservices.azure.com/luis/prediction/v3.0/apps
///fba6db0f-3d1d-42cd-8bda-488c14db85f6/slots/staging/predict
//?subscription-key=9692289c484a4b0aa0e673b3a7169d1f&verbose=true
//&show-all-intents=true&log=true&query=YOUR_QUERY_HERE

function AnalyzeText($url, $app, $key, $query) {
    // Prepare HTTP request
    // NOTE: Use the key 'http' even if you are making an HTTPS request. See:
    // http://php.net/manual/en/function.stream-context-create.php
    $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
    $options = array ( 'http' => array (
        'header' => $headers,
        'method' => 'GET',
        'ignore_errors' => true
    ));

    // build query string
    $subscription_key = "";
    $qs = http_build_query( array (
            "subscription-key" => $subscription_key,
            "verbose" => "true",
            "show-all-intents" => "true",
            "log" => "true",
            "query" => $query,
        )
    );

    $url = $url . $app . "?" . $qs;
    //$url = "https://testsbennert.cognitiveservices.azure.com/luis/prediction/v3.0/apps/fba6db0f-3d1d-42cd-8bda-488c14db85f6/slots/staging/predict?subscription-key=9692289c484a4b0aa0e673b3a7169d1f&verbose=true&show-all-intents=true&log=true&query=hi";
    print($url);

    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}

// check length of key
if (strlen($endpointKey) == 32) {

    print("LUIS Query: " . $term . "\n");


    $json = AnalyzeText($endpoint, $appId, $endpointKey, $term);

    print("\nJSON Response:\n\n");
    print(json_encode(json_decode($json), JSON_PRETTY_PRINT));
    print("\n");
    print($term);


} else {

    print("Invalid LUIS key!\n");
    print("Please paste yours into the source code.\n");

}
?>

