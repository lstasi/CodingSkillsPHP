<?php

namespace DataStructures;

class LinkedList {
	protected $firstNode;
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
			$this->getLastNode ()->setNextNode ( $node );
		}
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
		while ( $nextNode != NULL ) {
			$node = $nextNode;
			$nextNode = $node->getNextNode ();
		}
		return $node;
	}
}