<?php

namespace Google\Cloud\Samples\Dialogflow;

use Google\Cloud\Dialogflow\V2\IntentsClient;
use Google\Cloud\Dialogflow\V2\Intent\TrainingPhrase\Part;
use Google\Cloud\Dialogflow\V2\Intent\TrainingPhrase;
use Google\Cloud\Dialogflow\V2\Intent\Message\Text;
use Google\Cloud\Dialogflow\V2\Intent\Message;
use Google\Cloud\Dialogflow\V2\Intent;
use Intents;

require __DIR__.'/vendor/autoload.php';
include "../intents.php";

/**
 * Create an intent of the given intent type.
 * @param $projectId
 * @param $displayName
 * @param array $trainingPhraseParts
 * @param array $messageTexts
 * @throws \Google\ApiCore\ApiException
 * @throws \Google\ApiCore\ValidationException
 */
function intent_create($projectId, $displayName, $trainingPhraseParts = [],
                       $messageTexts = [])
{

    $test = array('credentials' => 'client-secret.json');
    $intentsClient = new IntentsClient($test);

    // prepare parent
    $parent = $intentsClient->agentName($projectId);

    // prepare training phrases for intent
    $trainingPhrases = [];
    foreach ($trainingPhraseParts as $trainingPhrasePart) {
        $part = (new Part())
            ->setText($trainingPhrasePart);

        // create new training phrase for each provided part
        $trainingPhrase = (new TrainingPhrase())
            ->setParts([$part]);
        $trainingPhrases[] = $trainingPhrase;
    }

    // prepare messages for intent
    $text = (new Text())
        ->setText($messageTexts);
    $message = (new Message())
        ->setText($text);

    // prepare intent
    $intent = (new Intent())
        ->setDisplayName($displayName)
        ->setTrainingPhrases($trainingPhrases)
        ->setMessages([$message]);

    // create intent
    $response = $intentsClient->createIntent($parent, $intent);
    printf('Intent created: %s' . PHP_EOL, $response->getName());

    $intentsClient->close();
}

$t =array();
$ClassIntents= new Intents();
$intents = $ClassIntents->getIntents();

for($i=0;$i < count($intents); $i++){
    intent_create('conversational-internship',$intents[$i]["intent"],$intents[$i]["example_phrases"],$t);
    sleep(20);
}



