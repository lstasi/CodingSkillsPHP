<?php

// php code is wrapped in <?php tags
$sampleData = array(
                    array(24, 90, 56, 5, 73, 1, 69, 18, 58, 3),
    
                    );

foreach ($sampleData as $inputArray) {
    echo maximunDrop($inputArray) . PHP_EOL;
}

function maximunDrop($inputArray)
{
    $maxDrop = 0;
    $currentMax = 0;
    $maxIdx = 0;
    for ($i = 0; $i < count($inputArray) - 1; $i ++) {
        //While loop the array check for Max value
        if ($currentMax < $inputArray[$i]) {
            $maxIdx = $i;
        }
        //Loop the array from next value 
        for ($j = ($i + 1); $j < count($inputArray); $j ++) {
            //While loop the array check for Max value
            if ($currentMax < $inputArray[$j]) {
                $maxIdx = $j;
            }
            //Calculate the drop and save ax min drop
            $drop = $inputArray[$i] - $inputArray[$j];
            if ($drop > $maxDrop) {
                $maxDrop = $drop;
            }
        }
        //If Loop reach max value Exit
        if ($i == $maxIdx) {
            break;
        }
    }
    return $maxDrop;
}

?>
