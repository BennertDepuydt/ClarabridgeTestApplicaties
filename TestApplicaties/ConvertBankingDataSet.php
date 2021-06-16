<?php


$strJsonFileContents = file_get_contents('train.json');
$json = json_decode($strJsonFileContents, true);
$intents = [];
$category = "";
$examples = [];

$fp = fopen("intentsSet5.json", 'a');
fwrite($fp, '[');
fclose($fp);
$count = 0;
for($i=0;$i < count($json)+1; $i++){
    if($i === 0){
        $category = $json[$i]["category"];
    }
    if($category === $json[$i]["category"]){
        if($count < 80){
            $examples[] = $json[$i]["text"];
            $count++;
        }
    }
    else {
        $intents["intent"] = $category;
        $intents["example_phrases"] = $examples;
        $resultJson = json_encode($intents);
        $fp = fopen("intentsSet5.json", 'a');
        fwrite($fp, json_encode(json_decode($resultJson), JSON_PRETTY_PRINT));
        fwrite($fp, ',');
        fclose($fp);
        $category = $json[$i]["category"];
        $examples = null;
        $intents = null;
        $count = 0;
    }
}
$fp = fopen("intentsSet5.json", 'a');
fwrite($fp, ']');
fclose($fp);

