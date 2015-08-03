<?php 
Namespace DataStructures;

class HashTables{
    
    private $keys=array();
    private $values=array();
    
    public function HashTables(){
        
    }
    public function setValue($key,$value){
        $this->values[]=$value;
        $idx = key($this->values);
        //sleep(1);
        return true;
    }
    public function getValue($key){
        
        return $value;
    }
    private function hashKey($key){
        
        $keyChars = split($key);
        $hashedKey = 0;
        foreach($keyChars as $char){
            $hashedKey +=  ord($char);
        }
        return $hashedKey;
    }
}

?>