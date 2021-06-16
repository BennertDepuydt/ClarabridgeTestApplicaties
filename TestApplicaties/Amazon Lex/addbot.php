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


$test4 = $lex_client->putBot([
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





