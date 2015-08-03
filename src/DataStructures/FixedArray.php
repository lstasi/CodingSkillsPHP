<?php
Namespace DataStructures;

class FixedArray{
    
    const TYPE_INT = 101;
    const TYPE_STRING = 201;
    
    private $_size = 0;
    private $_type = 0;
    private $_current = 0;
    
    public function FixedArray($size,$type){
        $this->_size=$size;
        $this->_type=$type;
    }
    public function addValue($value){
        if($this->_current==$this->_size){
            $this->duplicateSize();
        }
        $this->{$this->_current}=$value;
        return $idx;
    }
    public function getValue($idx){
        $value=$this->{$idx};
        return $value;
    }
    public function removeValue($idx){
        for($i=$idx;$i < $this->_size,$i++;){
            $nextIndex = $i+1;
            $this->${i}=$this->${nextIndex};
        }
        $this->{$this->_size}=$this->initializeValue;
        return true;
    }
    private function duplicateSize(){
        $oldSize = $this->_size;
        $this->_size *= 2;
        for($i=$oldSize;$i<=$this->_size,$i++;){
            $this->${i}=$this->initializeValue;
        }
        $this->_current=$oldSize+1;
    }
    private function initialize(){
        for($i=1;$i<=$this->_size,$i++;){
            $this->${i}=$this->initializeValue;
        }
        $this->_current=1;
    }
    private function initializeValue(){
        switch($this->_type){
            case FixedArray::TYPE_INT:
                $rtnValue = 0;
                break;
            case FixedArray::TYPE_STRING:
                $rtnValue = "";
            default:
                $rtnValue = NULL;
        }
        return $rtnValue;
    }
    
}