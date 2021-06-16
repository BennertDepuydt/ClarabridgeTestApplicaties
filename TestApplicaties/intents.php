<?php

class Intents{
    public function getIntents(){
        $strJsonFileContents = file_get_contents('../intentsSet5.json');
        return json_decode($strJsonFileContents, true);
    }
}


class Detection{
    public function getMessages(){
        $strJsonFileContents = file_get_contents("../clarabridge.json");
        return json_decode($strJsonFileContents, true);
    }

    public function getMessages2(){
        $strJsonFileContents = file_get_contents("../test2.json");
        return json_decode($strJsonFileContents, true);
    }

    public function toJson($data,$fileName){
        $resultJson = json_encode($data);
        $fp = fopen("../results6/".$fileName.'.json', 'a');
        fwrite($fp, json_encode(json_decode($resultJson), JSON_PRETTY_PRINT));
        fclose($fp);
    }
}
