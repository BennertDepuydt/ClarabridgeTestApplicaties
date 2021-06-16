<?php


$strJsonFileContents = file_get_contents('test.json');
$json = json_decode($strJsonFileContents, true);
$intents = [];


$fp = fopen("test2.json", 'a');
fwrite($fp, '[');
fclose($fp);
$count = 0;
for($i=0;$i < count($json); $i++){
    if($count == 7) {
        $i+=33;
        $count = 0;
    }
    else {
        $resultJson = json_encode($json[$i]);
        $fp = fopen("test2.json", 'a');
        fwrite($fp, json_encode(json_decode($resultJson), JSON_PRETTY_PRINT));
        fwrite($fp, ',');
        fclose($fp);
        $count++;
    }
}
$fp = fopen("test2.json", 'a');
fwrite($fp, ']');
fclose($fp);