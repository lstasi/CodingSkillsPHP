<?php
Namespace Tests;

class BaseTestCase extends \PHPUnit_Framework_TestCase{
    /**
     * Start Time of the test
     */
    protected $_startTime;
    /**
     * End Time of the test
     */
    protected $_endTime;
    protected $_elapsedTime;
    protected $_startMemory;
    protected $_endMemory;
    protected $_usedMemory;
    /**
     * Start Test 
     * Init values
     * Save Start Time and Initial Memory
     */
    protected function startTest($name){
        fwrite(STDOUT, $name);
        $this->_startTime=microtime(true);
        $this->_startMemory=memory_get_usage(true);
    }
    /**
     * End Test
     * Save End Time and Memory Usage
     */
    protected function endTest(){
        $this->_endTime=microtime(true);
        $this->_endMemory=memory_get_usage(true);
    }
    /**
     * Calculate Enlapsed Time
     */
    protected function elapsedTime(){
        $this->_elapsedTime=$this->_endTime-$this->_startTime;
    }
    /**
     * Calculate Used Memory
     */
    protected function usedMemory(){
        $this->_usedMemory=$this->_endMemory-$this->_startMemory;
    }
    protected function printComplexity(){
        $this->elapsedTime();
        $this->usedMemory();
        fwrite(STDOUT, " Time: " . $this->formatTime($this->_elapsedTime) . " Memory: " . $this->formatSize($this->_usedMemory) . "\n");
    }
    /**
     * Format Memory Size in bytes, kiloBytes, etc
     */
    protected function formatSize($size)
    {
        if($size){
            $unit=array('b','kb','mb','gb','tb','pb');
            return round($size/pow(1024,($i=floor(log($size,1024)))),8).' '.$unit[$i];
        }
        else{
            return "0 b";
        }
    }
    /**
     * Format Seconds with 8 decimals
     * @param float $seconds
     * @return string
     */
    protected function formatTime($seconds) {
       return number_format($seconds,8). " s";
    }
    /**
     * Output Message for Test
     * @param string $message
     */
    protected function log($message){
        fwrite(STDOUT, $message. "\n");
    }
    
}