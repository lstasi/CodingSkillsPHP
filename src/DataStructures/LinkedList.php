<?php
Namespace DataStructures;

class LinkedList{
    
    private $_firstNode;
    
    public function  __construct(){
        $this->_firstNode=NULL;        
    }
    public function addValue($value){
        $newNode = new ListNode($value);
        return $this->_addNode($newNode);
    }
    private function _addNode(ListNode $node){
        if($this->_firstNode==NULL){
            $this->_firstNode=$node;
        }
        else{
            $this->_getLastNode($this->_firstNode)->setNextNode($node);
        }
        return true;    
    }
    private function _getLastNode($node){
        if($node->getNextNode() == NULL){
            return $node;
        }
        else{
            return $this->_getLastNode($node->getNextNode());
        }
    }
    
}