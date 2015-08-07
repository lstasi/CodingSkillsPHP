<?php
Namespace DataStructures; 

class ListNode{
    
    private $_nextNode;
    private $_previousNode;
    private $_data;
    
    public function __construct($value){
        $this->_nextNode=NULL;
        $this->_previousNode=NULL;
        $this->_data=$value;
    }
    public function setNextNode(ListNode $node){
        $this->_nextNode=$node;
    }
    public function getNextNode(){
        return $this->_nextNode();
    }   
}