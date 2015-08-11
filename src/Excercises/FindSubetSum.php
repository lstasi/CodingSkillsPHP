<?php
define("SUB_SET_SIZE", 3);
$sampleArray = array(10, 12, 14, 15, 16, 17, 21, 46, 50, 53, 65, 68, 72, 74, 77, 78, 82, 89, 90);
$sumSample = array(
    array(
        185,
        "89,82,14"
    ),
    array(
        207,
        "89,72,46"
    )
);
foreach ($sumSample as $data) {
    echo ((findSubsetSum($sampleArray,SUB_SET_SIZE, $data[0]) == $data[1]) ? "OK" : "KO").PHP_EOL;
}

function findSubsetSum($inputArray, $subsetSize, $sum, $currentSum = 0, $currentIdx = NULL)
{
    if ($subsetSize == 1) {
        for ($i = 0; $i < count($inputArray); $i ++) {
            //Avoid checking the same number
            if ($currentIdx == $i) {
                continue;
            }
            if (($inputArray[$i] + $currentSum) === $sum) {
                return $inputArray[$i];
            } 
        }
        return false;
    } else {
        for ($i = 0; $i < count($inputArray); $i ++) {
            
            //Avoid checking the same number
            if (! is_null($currentIdx) and $currentIdx == $i) {
                continue;
            }
            $recursiveResult = findSubsetSum($inputArray, $subsetSize - 1, $sum, $inputArray[$i] + $currentSum, $i);
            if ($recursiveResult) {
                return $recursiveResult . "," . $inputArray[$i];
            }
        }
    }
}