<?php

//Full Text Numbers Search
define ("DIGITS",10);
$sampleData = array(
    "1234 567 890",
    "4124 123 123",
    "3123 123 322"
);

$searchSample = array(
    array("123","0,1,2"),
    array("41","1")
);


$index=buildIndex($sampleData);

foreach($searchSample as $searchData){

    echo (search($index, $searchData[0])==$searchData[1]?"OK":"KO").PHP_EOL;
}

function buildIndex($sampleData){

    $index = array();

    for($i=0; $i <  count($sampleData); $i++ ){

        for($j=0; $j < DIGITS; $j++ ){

            if($sampleData[$i][$j] != " "){

                if(!isset($index[$sampleData[$i][$j]]) or !in_array($i,$index[$sampleData[$i][$j]])){

                    $index[$sampleData[$i][$j]][]=$i;
                }

            }

        }
    }
    return $index;
}

function search($index,$searchValue){

    $results = array();
    for($i = 0; $i < strlen($searchValue); $i++){

        if(isset($index[$searchValue[$i]])){
            $results[$searchValue[$i]] = $index[$searchValue[$i]];
        }
        else{
            $finalResult = false;
        }
    }

    if($results){
        $resultArray=array_pop($results);
        foreach($results as $result){

            $resultArray = array_intersect($resultArray,$result);

        }

        $finalResult="";
        foreach($resultArray as $singleResult){
            $finalResult .= $singleResult.",";
        }
        $finalResult = rtrim($finalResult,",");
    }
    echo $finalResult.PHP_EOL;
    return $finalResult;

}

?>