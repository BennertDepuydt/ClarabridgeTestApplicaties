<?php

$strJsonFileContents = file_get_contents("microsoftluisresults.json");
// Convert to array
$array = json_decode($strJsonFileContents, true);
$test = array();

for($i=0;$i < count($array) ;$i++){
        $test[$array[$i]["prediction"]["topIntent"]] += 1;

}
var_dump($test);

