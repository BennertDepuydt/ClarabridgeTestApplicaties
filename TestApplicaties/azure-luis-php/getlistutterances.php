<?php

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll
// **********************************************
// *** Update or verify the following values. ***
// **********************************************
include '../intents.php';


$appId = "fba6db0f-3d1d-42cd-8bda-488c14db85f6";

// Replace with your endpoint key.
// You can use the authoring key instead of the endpoint key.
// The authoring key allows 1000 endpoint queries a month.
$endpointKey = "9d06c10bce394bd18513947ec4e02035";



// The endpoint URI below is for the West US region.
// If your subscription is in a different region, update accordingly.
$endpoint = "https://bennert.cognitiveservices.azure.com/luis/prediction/v3.0/apps/fba6db0f-3d1d-42cd-8bda-488c14db85f6/slots/staging/predict?";

// The LUIS query term
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
    $subscription_key = "9d06c10bce394bd18513947ec4e02035";
    $qs = http_build_query( array (
            "subscription-key" => $subscription_key,
            "verbose" => "true",
            "show-all-intents" => "true",
            "log" => "true",
            "query" => $query,
        )
    );





