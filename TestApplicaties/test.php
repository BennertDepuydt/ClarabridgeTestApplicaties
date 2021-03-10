<?php

$strJsonFileContents = file_get_contents("clarabridge.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);
$test = array();
$converted= array();

for ($i = 0; $i < count($array); $i++) {

    if (count($array[$i]["clarabridgeModelTags"]) === 0) {
        array_push($converted, $array[$i]);
        //echo "test";
    }

}

$fp = fopen('results.json', 'a');
fwrite($fp, json_encode($converted));
fclose($fp);
