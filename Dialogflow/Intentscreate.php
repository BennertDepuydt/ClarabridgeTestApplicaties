<?php

namespace Google\Cloud\Samples\Dialogflow;

use Google\Cloud\Dialogflow\V2\IntentsClient;
use Google\Cloud\Dialogflow\V2\Intent\TrainingPhrase\Part;
use Google\Cloud\Dialogflow\V2\Intent\TrainingPhrase;
use Google\Cloud\Dialogflow\V2\Intent\Message\Text;
use Google\Cloud\Dialogflow\V2\Intent\Message;
use Google\Cloud\Dialogflow\V2\Intent;

require __DIR__.'/vendor/autoload.php';

/**
 * Create an intent of the given intent type.
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



$strJsonFileContents = file_get_contents("intents.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);
$t = array();

for($i=0;$i < count($array); $i++){
    intent_create('conversational-internship',$array[$i]["intent"],$array[$i]["example_phrases"],$t);
}



