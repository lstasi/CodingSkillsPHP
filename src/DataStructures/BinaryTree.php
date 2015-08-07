<?php
Namespace DataStructures;

class BinaryTree{
    
    private $_rootNode;
    
    public function  __construct(){
        $this->_rootNode=NULL;
    }
    
    public function addNode(TreeNode $node){
        if($this->_rootNode==NULL){
            $this->_rootNode=$node;
        }
        else{
            
        }
    }
}