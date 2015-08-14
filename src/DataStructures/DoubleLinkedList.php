<?php
namespace DataStructures;

class DoubleLinkedList extends LinkedList
{

    public function addValue($value)
    {
        $newNode = new ListNode($value);
        return $this->_addNode($newNode);
    }
    public function pushValue($value){
        $newNode = new ListNode($value);
        return $this->_setFirstNode($newNode);
    }
    public function removeFirstValue(){
        //Save firstNode
    	$firstNode=$this->getFirstNode();
    	//Remove node
    	$this->firstNode = $firstNode->getNextNode();
    	//Save value to return
    	$value = $firstNode->getValue();
    	//Delete node from memory
    	unset($firstNode);
    	return $value;
    }
    public function removeLastValue()
    {
        //Save last node
        $lastNode=$this->getLastNode();
        $this->lastNode = $lastNode->getPreviousNode();
        //Save value for return
        $value = $lastNode->getValue();
        //Delete node from memory
        unset($lastNode);
        return $value;
    }
    protected  function _setFirstNode(ListNode $node){
        if ($this->firstNode == NULL) {
            $this->firstNode = $node;
        }
        else{
            //Save first node
            $currentNode = $this->firstNode;
            $this->firstNode = $node;
            //Add new node
            $currentNode->setPreviousNode($node);
            $node->setNextNode($currentNode);
        }
        return true;
    }
    protected function _addNode(ListNode $node)
    {
        if ($this->firstNode == NULL) {
            $node->setPreviousNode($node);
            $this->firstNode = $node;
        } else {
            //Add node to the last node of the list
            $lastNode = $this->getLastNode();
            $node->setPreviousNode($lastNode);
            $lastNode->setNextNode($node);
        }
        $this->lastNode = $node;
        return true;
    }
}