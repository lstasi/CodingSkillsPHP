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
        //If Base node is bigger add new node to the left
        if ($baseNode->getValue() > $node->getValue()) {
            //If there is no node at the left add the node
            if(is_null($baseNode->getLeftLeaf())){
                $node->setParent($baseNode);
                $baseNode->setLeftLeaf($node);
                return true;
            }
            //Recurse to the left with the left node as Base
            else{
                return $this->_insertNode($baseNode->getLeftLeaf(),$node);
            }
        //If Base node is lesser add new node to the right    
        } elseif ($baseNode->getValue() < $node->getValue()) {
            //If there is no node to the right add the node
            if(is_null($baseNode->getRightLeaf())){
                $node->setParent($baseNode);
                $baseNode->setRightLeaf($node);
                return true;
            }
            //Recurse to the right using right noe as Base
            else{
                return $this->_insertNode($baseNode->getRightLeaf(),$node);
            }
        } else {
            //Input node is equal to the Base Node then Node already Added
            return true;
        }
    }
    public function findNode(TreeNode $node)
    {
        //Recurse traverse from the root node
        return $this->_findNode($node,$this->rootNode);
    }
    private function _findNode(TreeNode $node,TreeNode $baseNode = NULL){
        
        //Is base node is null Node is no on the tree
        if(is_null($baseNode)){
            return false;
        }
        //If value is equal we return the node
        if ($baseNode->getValue() == $node->getValue()) {
            return $baseNode;
        //Node is less traverse left
        } elseif ($baseNode->getValue() > $node->getValue()) {
            return $this->_findNode($node,$baseNode->getLeftLeaf());
        //Node is less traverse Right
        } elseif ($baseNode->getValue() < $node->getValue()) {
            return $this->_findNode($node,$baseNode->getRightLeaf());
        }
    }
}