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
    print($url);

    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);

}

// check length of key
if (strlen($endpointKey) == 32) {

    $strJsonFileContents = file_get_contents("clarabridge.json");
    // Convert to array
    $array = json_decode($strJsonFileContents, true);

    for($i=0;$i < count($array); $i++){

        $json = AnalyzeText($endpoint, $appId, $endpointKey, $array[$i]['title']);
        print("\nJSON Response:\n\n");
        print(json_encode(json_decode($json), JSON_PRETTY_PRINT));
        print("\n");
        print($term);
        $fp = fopen('results.json', 'a');
        fwrite($fp, json_encode(json_decode($json), JSON_PRETTY_PRINT));
        fclose($fp);
    }
} else {

    print("Invalid LUIS key!\n");
    print("Please paste yours into the source code.\n");

}
?>

