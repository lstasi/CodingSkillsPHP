<?php
namespace DataStructures;

class DoubleLinkedList extends LinkedList
{

    public function addValue($value)
    {
        $newNode = new ListNode($value);
        return $this->_addNode($newNode);
    }
    public function removeFirstValue(){
    	$firstNode=$this->getFirstNode();
    	$this->firstNode = $firstNode->getNextNode();
    	$value = $firstNode->getValue();
    	unset($firstNode);
    	return $value;
    }
    public function removeLastValue()
    {
        $lastNode=$this->getLastNode();
        $this->lastNode = $lastNode->getPreviousNode();
        $value = $lastNode->getValue();
        unset($lastNode);
        return $value;
    }

    protected function _addNode(ListNode $node)
    {
        if ($this->firstNode == NULL) {
            $node->setPreviousNode($node);
            $this->firstNode = $node;
        } else {
            $lastNode = $this->getLastNode();
            $node->setPreviousNode($lastNode);
            $lastNode->setNextNode($node);
        }
        $this->lastNode = $node;
        return true;
    }
}