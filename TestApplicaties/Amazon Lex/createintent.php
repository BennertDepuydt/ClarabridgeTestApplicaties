<?php

use Aws\Credentials\Credentials;

require 'vendor/autoload.php';
include '../intents.php';

$credentials = new \Aws\Credentials\Credentials('{key}', '{key}');

$options = [
    'region'            => 'us-west-2',
    'version'           => 'latest',
    'credentials' => $credentials,
    'http'    => [
        'verify' => 'cacert.pem'
    ]
];

$lex_client = new Aws\LexModelBuildingService\LexModelBuildingServiceClient($options);
$lex_client2 = new Aws\LexRunTimeService\LexRuntimeServiceClient($options);

$ClassIntents = new Intents();
$array = $ClassIntents->getIntents();

/*$test3 = $lex_client->getBot([
    'name' => 'Bennert', // REQUIRED
    'versionOrAlias' => '$LATEST', // REQUIRED
]);*/

$bot = $lex_client->describeBot([
    'botId' => "{key}"
]);

$botId = $bot["botId"];

$intents = array();
for($i=0;$i <= count($array)-1; $i++) {
    $examples = [];
    for($j=0;$j <= count($array[$i]["example_phrases"])-1; $j++) {
        if(strlen($array[$i]["example_phrases"][$j]) < 200){
            $examples[] = $array[$i]["example_phrases"][$j];
        }
    }

    $examplesFormat = array_map(function(string $example){
        return array("utterance" => $example);
    }, $examples);

    $test = $lex_client->putIntent([
        'name' => utf8_decode($array[$i]["intent"]),
        'sampleUtterances' => $examplesFormat,
        'fulfillmentActivity' => [
        'type' => 'ReturnIntent',
        ],
    ]);
    $intents[$i]['intentName'] =  utf8_decode($array[$i]["intent"]);
    $intents[$i]['intentVersion'] = '$LATEST';
    print($array[$i]["intent"] . "created");
    sleep(20);
}


$test4 = $lex_client->putBot([
    'checksum' => 'latest',
    'intents' => $intents,
        // ...
    'name' => "Bennert", // REQUIRED
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





