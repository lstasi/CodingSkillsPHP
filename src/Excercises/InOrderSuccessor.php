<?php
namespace Excercises;

use DataStructures\BinarySearchTree;
use DataStructures\TreeNode;
// Find the in-order successor of a node in BST
class InOrderSuccessor
{

    public static function findInOrderSuccessor(TreeNode $node)
    {
        
        $right = $node->getRightLeaf();
        //If node has right leaf. Traversdown to the left
        if (!is_null($right)) {
                return self::traverseDownNodes($right, $node->getValue());
        } else {
            //Else Traverse Up until find greater value
            $parent = $node->getParent();
            if (!is_null($parent)) {
                return self::traverseUpNodes($parent, $node->getValue());
            }
            else{
                //Else no in order succesor found
                return TreeNode(false);
            }
        }
    }

    public static function traverseDownNodes(TreeNode $node, $value)
    {
        
        if (! is_null($node->getLeftLeaf())) {
            //If Leaft Node is greater recurse traverse down
            if ($node->getLeftLeaf()->getValue() > $value) {
                return self::traverseDownNodes($node->getLeftLeaf(), $value);
            }
        }
        else{
            //If not left leaf found Node is in order succesor
            return $node;
        }
    }

    public static function traverseUpNodes(TreeNode $node, $value)
    {
        //If Parent Node is lesser recurse traverse up
        if ($node->getValue() < $value) {
            $parent=$node->getParent();
            if(!is_null($parent)){
                return self::traverseUpNodes($parent, $value);
            }
            else{
                return TreeNode(false);
            }
            
        } else {
            //If node is greater in order succesor found
            return $node;
        }
    }
}