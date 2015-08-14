<?php

namespace DataStructures;

class LinkedList {
    /**
     * First node of the list
     * @var ListNode
     */
	protected $firstNode;
	/**
	 * Last Node of the list
	 * @var ListNode
	 */
	protected $lastNode;
	
	public function __construct() {
		$this->firstNode = NULL;
		$this->lastNode = NULL;
	}
	
	public function getFirstNode(){
		return $this->firstNode;
	}
	
	public function getLastNode(){
		return $this->lastNode;
	}
	
	public function addValue($value) {
		$newNode = new ListNode ( $value );
		return $this->_addNode ( $newNode );
	}
	
	public function searchValue($value) {
		/**
		 *
		 * @var ListNode
		 */
		$node = $this->firstNode;
		$rtnNode = false;
		//Traverse the list until find the value
		while ( ! is_null ( $node ) ) {
			if ($node->getValue () == $value) {
				$rtnNode = $node;
				break;
			} else {
				$node = $node->getNextNode ();
			}
		}
		return $rtnNode;
	}
	protected function _addNode(ListNode $node) {
		if ($this->firstNode == NULL) {
			$this->firstNode = $node;
		} else {
		    //Get last Node add new node to the end
			$this->getLastNode ()->setNextNode ( $node );
		}
		//Set new last node
		$this->lastNode = $node;
		return true;
	}
	protected function _searchLastNode($node) {
		/*
		 * Recursion Version php Max 256
		 * if($node->getNextNode() == NULL){
		 * return $node;
		 * }
		 * else{
		 * return $this->_getLastNode($node->getNextNode());
		 * }
		 */
		$nextNode = $node->getNextNode ();
		//Loop the list until find the last node
		while ( $nextNode != NULL ) {
			$node = $nextNode;
			$nextNode = $node->getNextNode ();
		}
		return $node;
	}
}