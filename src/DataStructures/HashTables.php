<?php 
Namespace DataStructures;

class HashTables{
    
    private $keys;
    private $values;
    
    public function __construct(){
        $this->keys = new FixedArray(10, FixedArray::TYPE_INT);
        $this->values = new FixedArray(10, FixedArray::TYPE_INT);
    }
    public function setValue($key,$value){
        
        $key = $this->_hashKey($key);
        $idxValue=$this->keys->addSortedValue($key);
        $this->values->setValue($idxValue, $value);
        return true;
    }
    public function getValue($key){
        $key = $this->_hashKey($key);
        $idxValue=$this->keys->searchValue($key);
        $value=$this->values->getValue($idxValue);
        return $value;
    }
    private function _hashKey($key){
        
        $keyChars = split($key);
        $hashedKey = 0;
        foreach($keyChars as $char){
            $hashedKey +=  ord($char);
        }
        return $hashedKey;
    }
}

?>