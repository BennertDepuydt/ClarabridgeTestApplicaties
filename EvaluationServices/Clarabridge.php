<?php

$strJsonFileContents = file_get_contents("clarabridge.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);
$test = array();

for($i=0;$i < count($array); $i++){
    for($j=0;$j< count($array[$i]["clarabridgeModelTags"]);$j++){
        $test[$array[$i]["clarabridgeModelTags"][$j]] += 1;
    }
    if(count($array[$i]["clarabridgeModelTags"]) == 0 ){
        $test["empty"] +=1;
    }

}
var_dump($test);
