<?php 
Namespace DataStructures;

class HashTables{
    
    private $keys;
    private $values;
    
    public function __construct(){
        $this->keys = new FixedArray(10, FixedArray::TYPE_STRING);
        $this->values = new FixedArray(10, FixedArray::TYPE_INT);
    }
    public function setValue($key,$value){
        
        //$hashedKey = $this->_hashKey($key);
        $idxValue=$this->keys->searchValue($key);
        if(!$idxValue){
            $idxValue=$this->keys->addValue($key);
        }
        $this->values->setValue($idxValue, $value);
        return true;
    }
    public function getValue($key){
        //$hashedKey = $this->_hashKey($key);
        $idxValue=$this->keys->searchValue($key);
        $value=$this->values->getValue($idxValue);
        return $value;
    }
    private function _hashKey($key){
        $keyChars = str_split($key);
        $hashedKey = 0;
        foreach($keyChars as $char){
            $hashedKey +=  ord($char);
        }
        return $hashedKey;
    }
}

?>