<?php

// Full Text Numbers Search
define("DIGITS", 10);
$sampleData = array(
    "1234 567 890",
    "4124 123 123",
    "3123 123 322"
);

$searchSample = array(
    array(
        "123",
        "0,1,2"
    ),
    array(
        "41",
        "1"
    ),
    array(
        "32",
        "2"
    )
);

$index = buildIndex($sampleData);

foreach ($searchSample as $searchData) {
    
    echo (search($index, $searchData[0]) == $searchData[1] ? "OK" : "KO") . PHP_EOL;
}

function buildIndex($inputData)
{
    $index = array();
    
    $digitSizes = array(
        1,
        2,
        3,
        4
    );
    //For each Line
    for ($i = 0; $i < count($inputData); $i ++) {
        $line = $inputData[$i];
        //Explode numbers using empty space
        $items = explode(" ", $line);
        //For each number block
        foreach ($items as $numbers) {
            
            $numberSize = strlen($numbers);
            //Build all possible numbers with numbers bock grouping by digitsizes 1,2,3,4
            foreach ($digitSizes as $idxSize) {
                //Build numbers
                for ($start = 0; $start < $numberSize; $start ++) {
                    
                    if (! (($start + $idxSize) > $numberSize)) {
                        
                        $number = substr($numbers, $start, $idxSize);
                        //Add value to array and assign row number
                        if (! isset($index[$number]) or ! in_array($i, $index[$number])) {
                            $index[$number][] = $i;
                        }
                    }
                }
            }
        }
    }
    return $index;
}

function search($index, $searchValue)
{
    $finalResult = array();
    if (isset($index[$searchValue])) {
        $finalResult = $index[$searchValue];
    } else {
        $finalResult = false;
    }
    if ($finalResult) {
        $finalResult = implode(",", $finalResult);
    }
    return $finalResult;
}

?>