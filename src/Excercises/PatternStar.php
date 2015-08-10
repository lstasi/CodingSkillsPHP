<?php
//isMatch("aa","a") return false
//isMatch("aa","aa") return true
//isMatch("aaa","aa") return false
//isMatch("aa", "a*") return true
//isMatch("aa", ".*") return true
//isMatch("ab", ".*") return true
//sMatch("aab", "c*a*b") return true


$sampleData[] = array("a","a", true);
$sampleData[] = array("b","a", false);
$sampleData[] = array("aa","aa", true);
$sampleData[] = array("ab","aa", false);
$sampleData[] = array("a", "a*", true);
$sampleData[] = array("aa", "a*", true);
$sampleData[] = array("aa", ".*", true);
$sampleData[] = array("ab", ".*", true);
$sampleData[] = array("aab", "c*a*b", true);

foreach($sampleData as $testData){
    echo (isMatch($testData[0],$testData[1])==$testData[2]?"OK":"KO").PHP_EOL;
}


function isMatch($inputString,$pattern){


    //echo "Input String: ".$inputString.PHP_EOL;
    //echo "Pattern: ".$pattern.PHP_EOL;
    $countIS=strlen($inputString);
    $countP=strlen($pattern);

    //echo "Count Input String: ".$countIS.PHP_EOL;
    //echo "Count Pattern: ".$countP.PHP_EOL;

    if($countIS==1 and $countP==1 and $inputString==$pattern){
        return true;
    }
    elseif($countIS==1 and $countP==2 and $pattern[1]=="*"){
        if($inputString==$pattern[0] or $pattern[0]=="."){
            return true;
        }
        else{
            return false;
        }
    }
    elseif($countIS >= 1 and $countP > 1){
        if($pattern[1]=="*"){
            if(isMatch($inputString[0],substr($pattern,0,2))){
                return isMatch(substr($inputString,1,$countIS),substr($pattern,0,$countP));
            }
            elseif(!isMatch($inputString[0],substr($pattern,0,2))){
                return isMatch(substr($inputString,0,$countIS),substr($pattern,2,$countP));
            }

        }
        else{

            return (isMatch($inputString[0],$pattern[0])
                and
                isMatch(substr($inputString,1,$countIS),substr($pattern,1,$countP)));
        }
    }
    elseif($countIS==1 and $countP==1 and $inputString != $pattern){
        return false;
    }
    else{
        throw new Exception("Pattern Fail!");
    }

}