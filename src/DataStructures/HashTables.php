<?php 
Namespace DataStructures;

class HashTables{
    /**
     * Internal array for Keys
     * @var FixedArray
     */
    private $keys;
    /**
     * Internal array for Values
     * @var FixedArray
     */
    private $values;
    
    public function __construct(){
        $this->keys = new FixedArray(10, FixedArray::TYPE_STRING);
        $this->values = new FixedArray(10, FixedArray::TYPE_INT);
    }
    public function setValue($key,$value){
        
        //Search the key on the key array return the index
        $idxValue=$this->keys->searchValue($key);
        //If key is no on the array add new value
        if(!$idxValue){
            $idxValue=$this->keys->addValue($key);
        }
        //Add the value to the values array on the key index
        $this->values->setValue($idxValue, $value);
        return true;
    }
    public function getValue($key){
        //Search the key on the key array
        $idxValue=$this->keys->searchValue($key);
        //Return the value from the values array 
        //Using the index of the key array
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