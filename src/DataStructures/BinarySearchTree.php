<?php
namespace DataStructures;

class BinarySearchTree extends BinaryTree
{

    protected function _addNode(TreeNode $node)
    {
        if ($this->rootNode == NULL) {
            $this->rootNode = $node;
        } else {
           
            $this->_insertNode($this->rootNode, $node);
        }
    }

    protected function _insertNode(TreeNode $baseNode, TreeNode $node)
    {
        if ($baseNode->getValue() > $node->getValue()) {
            if(is_null($baseNode->getLeftLeaf())){
                $baseNode->setLeftLeaf($node);
                return true;
            }
            else{
                return $this->_insertNode($baseNode->getLeftLeaf(),$node);
            }
            
        } elseif ($baseNode->getValue() < $node->getValue()) {
            if(is_null($baseNode->getRightLeaf())){
                $baseNode->setRightLeaf($node);
                return true;
            }
            else{
                return $this->_insertNode($baseNode->getRightLeaf(),$node);
            }
        } else {
            //Node already Added
            return true;
        }
    }
}