<?php
include 'ClaraBridgeClass.php';

class Intent {
    private $intent;
    private $score;
    public function __construct($i, $s) {
        $this->intent = $i;
        $this->score = $s;
    }
    public function getIntent()
    {
        return $this->intent;
    }
    public function getScore()
    {
        return $this->score;
    }
    public function tooLong()
    {
        return new self("to_long",0);
    }
    public function tooShort()
    {
        return new self("to_short",0);
    }
    public function noIntentFound()
    {
        return new self("not_found",0);
    }
}



class Services {
    private array $results;
    public function addIntentClassifcation($query, Intent $intent)
    {
        if($intent->getIntent() == "string_to_long"){
            $intent = $intent->tooLong();
            $this->setResult($query, $intent);
        }
        elseif($intent->getIntent() == "empty_string" or $query == ""){
            $intent = $intent->tooShort();
            $this->setResult($query, $intent);
        }
        elseif($intent->getIntent() == "result_not_found" or $intent->getIntent() == "Default Fallback Intent" or $intent->getIntent() == null){
            $intent = $intent->noIntentFound();
            $this->setResult($query, $intent);
        }
        else {
            $this->setResult($query, $intent);
        }
    }
    private function setResult($query,$intent){
        $this->results[] = array(
            'query' => $query,
            'intent' => $intent->getIntent(),
            'score' => $intent->getScore(),
        );
    }
    public function toJson($file){
        $data = json_encode($this->results);
        $fp = fopen( 'results/'.$file, 'w');
        fwrite($fp, json_encode(json_decode($data), JSON_PRETTY_PRINT));
        fclose($fp);
    }
    public function toJsonDataset2($file){
        $data = json_encode($this->results);
        $fp = fopen( 'dataset2_80_examples_results/'.$file, 'w');
        fwrite($fp, json_encode(json_decode($data), JSON_PRETTY_PRINT));
        fclose($fp);
    }
    public function getResults(){
        return $this->results;
    }
    public function getIndexResults($i){
        return $this->results[$i];
    }
}



//clarabridge model
/*$result = new ClaraModel();
$results2test = array();
$data = $result->getJson();
for($i=0;$i< count($data); $i++){
    $intents = array();
    if(count($data[$i]["clarabridgeModelTags"]) != 0){
            for($j=0;$j< count($data[$i]["clarabridgeModelTags"]); $j++) {
                $intent = $result->convertTagToIntent($data[$i]["clarabridgeModelTags"][$j]);
                array_push($intents, $intent);
            }
        $result->addIntentClassifcation($data[$i]["title"], $intents);
    }
    else {
        $result->addIntentClassifcation($data[$i]["title"], array());
    }
    $test = $result->getIndexResults($i);
    $results2test[$i]["query"] = $data[$i]["title"];
    $results2test[$i]["services"]["clarabridge"]["intent"] = $test["intent"];
    $results2test[$i]["services"]['clarabridge']["score"] = $test["score"];
}
$result->toJson();

// get all results of every service in json file
$files = scandir('../TestApplicaties/results/');
$files = array_diff($files, array('.', '..'));
$query = array();
foreach($files as $file)
{
    if($file)
    $result = new Services();
    $strJsonFileContents = file_get_contents('../TestApplicaties/results/'. $file);
    $data = json_decode($strJsonFileContents, true);
    for($i=0;$i< count($data); $i++){
        $intent = new Intent($data[$i]["intent"],$data[$i]["score"]);
        $result->addIntentClassifcation($data[$i]["query"], $intent);
        $test = $result->getIndexResults($i);
        $resultsdataset2test[$i]["query"] = $data[$i]["query"];
        $resultsdataset2test[$i]["services"][substr($file,0,-5)]["intent"] = $test["intent"];
        $resultsdataset2test[$i]["services"][substr($file,0,-5)]["score"] = $test["score"];
    }
    $result->toJson($file);
}

$data = json_encode($resultsdataset2test);
$fp = fopen( 'results/combined.json', 'w');
fwrite($fp, json_encode(json_decode($data), JSON_PRETTY_PRINT));
fclose($fp);

*/

//dataset2
//get testdataset2
$resultsdataset2test = array();
$strJsonFileContents = file_get_contents('../TestApplicaties/test2.json');
$data = json_decode($strJsonFileContents, true);
$dataset2 = new Services();
for($i=0;$i< count($data); $i++){
    $intent = new Intent($data[$i]["intent"],1);
    $dataset2->addIntentClassifcation($data[$i]["text"], $intent);
    $test = $dataset2->getIndexResults($i);
    $resultsdataset2test[$i]["query"] = $data[$i]["query"];
    $resultsdataset2test[$i]["services"]["dataset2"]["intent"] = $test["intent"];
    $resultsdataset2test[$i]["services"]['dataset2']["score"] = $test["score"];
}
$dataset2->toJsonDataset2("test2.json");

// get all results of every service in json file
$files = scandir('../TestApplicaties/results6/');
$files = array_diff($files, array('.', '..'));
$query = array();
foreach($files as $file)
{
    if($file)
    $result = new Services();
    //$strJsonFileContents = file_get_contents('../TestApplicaties/results/'. $file);
    $strJsonFileContents = file_get_contents('../TestApplicaties/results6/'. $file);
    $data = json_decode($strJsonFileContents, true);
    for($i=0;$i< count($data); $i++){
        $intent = new Intent($data[$i]["intent"],$data[$i]["score"]);
        $result->addIntentClassifcation($data[$i]["query"], $intent);
        $test = $result->getIndexResults($i);
        $resultsdataset2test[$i]["query"] = $data[$i]["query"];
        $resultsdataset2test[$i]["services"][substr($file,0,-5)]["intent"] = $test["intent"];
        $resultsdataset2test[$i]["services"][substr($file,0,-5)]["score"] = $test["score"];
    }
    $result->toJsonDataset2($file);
}

// combined json with all services
$data = json_encode($resultsdataset2test);
$fp = fopen( 'dataset2_80_examples_results/combined.json', 'w');
fwrite($fp, json_encode(json_decode($data), JSON_PRETTY_PRINT));
fclose($fp);











