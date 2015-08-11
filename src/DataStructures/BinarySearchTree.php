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
                $node->setParent($baseNode);
                $baseNode->setLeftLeaf($node);
                return true;
            }
            else{
                return $this->_insertNode($baseNode->getLeftLeaf(),$node);
            }
            
        } elseif ($baseNode->getValue() < $node->getValue()) {
            if(is_null($baseNode->getRightLeaf())){
                $node->setParent($baseNode);
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
    public function findNode(TreeNode $node)
    {
        return $this->_findNode($node,$this->rootNode);
    }
    private function _findNode(TreeNode $node,TreeNode $baseNode = NULL){
        
        if(is_null($baseNode)){
            return false;
        }
        if ($baseNode->getValue() == $node->getValue()) {
            return $baseNode;
        } elseif ($baseNode->getValue() > $node->getValue()) {
            return $this->_findNode($node,$baseNode->getLeftLeaf());
        } elseif ($baseNode->getValue() < $node->getValue()) {
            return $this->_findNode($node,$baseNode->getRightLeaf());
        }
    }
}