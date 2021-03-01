<?php

use Aws\Credentials\Credentials;

require 'vendor/autoload.php';



$credentials = new Credentials('', '');

$options = [
    'region'            => 'us-west-2',
    'version'           => 'latest',
    'debug' => true,
    'credentials' => $credentials,
    'http'    => [
        'verify' => 'cacert.pem'
    ]
];

$lex_client = new Aws\LexModelBuildingService\LexModelBuildingServiceClient($options);
$lex_client2 = new Aws\LexRunTimeService\LexRuntimeServiceClient($options);


$strJsonFileContents = file_get_contents("intents.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);

$intents = array();
for($i=0;$i <= count($array)-1; $i++) {
    $test = $lex_client->putIntent([
        'name' => $array[$i]["intent"],
        'sampleUtterances' => $array[$i]["example_phrases"],
        'fulfillmentActivity' => [
        'type' => 'ReturnIntent',
        ],
    ]);
    echo  $test;
    $intents[$i]['intentName'] =  $array[$i]["intent"];
    $intents[$i]['intentVersion'] = '1';
}

$test3 = $lex_client->getBot([
    'name' => 'TestBennert', // REQUIRED
    'versionOrAlias' => '$LATEST', // REQUIRED
]);
echo $test3;

$test4 = $lex_client->putBot([
    'checksum' => $test3['checksum'],
    'intents' => $intents,
        // ...
    'name' => "TestBennert", // REQUIRED
    'locale' => 'en-AU', // REQUIRED
    'childDirected' => false, // REQUIRED
    'abortStatement' => [
        'messages' => [ // REQUIRED
            [
                'content' => 'test', // REQUIRED
                'contentType' => 'PlainText', // REQUIRED
            ],

        ],
    ],
]);





