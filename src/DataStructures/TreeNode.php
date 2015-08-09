<?php
Namespace DataStructures; 

class TreeNode{
    
    /**
     *
     * @var TreeNode
     */
    private $parent;
    /**
     * 
     * @var TreeNode
     */
    private $leftLeaf;
    /**
     *
     * @var TreeNode
     */
    private $rightLeaf;
    /**
     *
     * @var TreeNode
     */
    private $data;
    public function __construct($value) {
    	$this->leftLeaf = NULL;
    	$this->rightLeaf = NULL;
    	$this->data = $value;
    }
    public function setRightLeaf(TreeNode $node) {
    	$this->rightLeaf = $node;
    }
    public function setLeftLeaf(TreeNode $node) {
    	$this->leftLeaf = $node;
    }
    public function getRightLeaf() {
    	return $this->rightLeaf;
    }
    public function getLeftLeaf() {
    	return $this->leftLeaf;
    }
    public function getValue() {
    	return $this->data;
    }
    public function addLeaf(TreeNode $node){
    	if(is_null($this->leftLeaf)){
    		$this->leftLeaf = $node;
    	}
    	elseif(is_null($this->rightLeaf)){
    		$this->rightLeaf = $node;
    	}
    	else{
    		return false;
    	}
    }
}