<?php

// NOTE: Be sure to uncomment the following line in your php.ini file.
// ;extension=php_openssl.dll

// **********************************************
// *** Update or verify the following values. ***
// **********************************************
include '../intents.php';
$appId = "{key}";

// Replace with your endpoint key.
// You can use the authoring key instead of the endpoint key.
// The authoring key allows 1000 endpoint queries a month.
$endpointKey = "{key}";



// The endpoint URI below is for the West US region.
// If your subscription is in a different region, update accordingly.
$endpoint = "https://bennert.cognitiveservices.azure.com/luis/prediction/v3.0/apps/{key}/slots/staging/predict?";;

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
    $subscription_key = "{key}";
    $qs = http_build_query( array (
            "subscription-key" => $subscription_key,
            "verbose" => "true",
            "show-all-intents" => "true",
            "log" => "true",
            "query" => $query,
        )
    );

    $url = $url . $app . "?" . $qs;
    // Perform the Web request and get the JSON response
    $context = stream_context_create($options);
    $file= file_get_contents($url, false, $context);
    return json_decode($file, true);

}

// check length of key
if (strlen($endpointKey) == 32) {
    $ClassDetection = new Detection();
    $array = $ClassDetection->getMessages2();
    $resultCustom = array();
    //$time_pre = microtime(true);
    for($i=0;$i < count($array); $i++){
        $resultCustom[$i]['intent'] = "empty_string";;
        $resultCustom[$i]['query'] = $array[$i]['text'];
        $resultCustom[$i]['score'] = null;
        //$resultCustom[$i]['alternativeIntents'] = null;
        $json = AnalyzeText($endpoint, $appId, $endpointKey, $array[$i]['text']);
        $string = $json["prediction"]["topIntent"];
        if($array[$i]['text'] === ""){
            $resultCustom[$i]['intent'] = "empty_string";
        }
        elseif($json["prediction"]["topIntent"] === "None" or $json["prediction"]["topIntent"] === null or $json["prediction"]["intents"][$string]["score"] < 0.3 ){
            $resultCustom[$i]['intent'] = "result_not_found";
        }
        else {
            $resultCustom[$i]['query'] = $array[$i]['text'];
            $string = $json["prediction"]["topIntent"];
            $resultCustom[$i]['intent'] = $string;
            $resultCustom[$i]['score'] = $json["prediction"]["intents"][$string]["score"];
            //$resultCustom[$i]['alternativeIntents'] = $json[0]["prediction"]["intents"];
        }
        sleep(1);
        echo $i;

    }
    //$time_post = microtime(true);
    //$exec_time = $time_post - $time_pre;
    //print("\n");
    //print($exec_time);
    $ClassDetection->toJson($resultCustom,"azureDataset2");
} else {

    print("Invalid LUIS key!\n");
    print("Please paste yours into the source code.\n");

}
?>

