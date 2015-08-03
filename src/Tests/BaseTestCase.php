<?php
Namespace Tests;

class BaseTestCase extends \PHPUnit_Framework_TestCase{

    protected $_startTime;
    protected $_endTime;
    protected $_elapsedTime;
    protected $_startMemory;
    protected $_endMemory;
    protected $_usedMemory;
    
    protected function startTest($name){
        fwrite(STDOUT, $name);
        $this->_startTime=microtime(true);
        $this->_startMemory=memory_get_usage(true);
    }
    protected function endTest(){
        $this->_endTime=microtime(true);
        $this->_endMemory=memory_get_usage(true);
    }
    protected function elapsedTime(){
        $this->_elapsedTime=$this->_endTime-$this->_startTime;
    }
    protected function usedMemory(){
        $this->_usedMemory=$this->_endMemory-$this->_startMemory;
    }
    protected function printComplexity(){
        $this->elapsedTime();
        $this->usedMemory();
        fwrite(STDOUT, " Time: " . $this->formatTime($this->_elapsedTime) . " Memory: " . $this->formatSize($this->_usedMemory) . "\n");
    }
    protected function formatSize($size)
    {
        if($size){
            $unit=array('b','kb','mb','gb','tb','pb');
            return round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
        }
        else{
            return 0;
        }
    }
    function formatTime($seconds) {
       return number_format($seconds,2). " s";
    }
    
}