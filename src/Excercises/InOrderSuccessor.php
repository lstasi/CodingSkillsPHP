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
        if (!is_null($right)) {
                return self::traverseDownNodes($right, $node->getValue());
        } else {
            $parent = $node->getParent();
            if (!is_null($parent)) {
                return self::traverseUpNodes($parent, $node->getValue());
            }
            else{
                return TreeNode(false);
            }
        }
    }

    public static function traverseDownNodes(TreeNode $node, $value)
    {
        if (! is_null($node->getLeftLeaf())) {
            if ($node->getLeftLeaf()->getValue() > $value) {
                return self::traverseDownNodes($node->getLeftLeaf(), $value);
            }
        }
        else{
            return $node;
        }
    }

    public static function traverseUpNodes(TreeNode $node, $value)
    {
        if ($node->getValue() < $value) {
            $parent=$node->getParent();
            if(!is_null($parent)){
                return self::traverseUpNodes($parent, $value);
            }
            else{
                return TreeNode(false);
            }
            
        } else {
            return $node;
            /*
            $leftNode = $node->getLeftLeaf();
            if (is_null($leftNode)) {
                return $node;
            } else {
                return self::traverseDownNodes($node->getLeftLeaf(), $value);
            }*/
        }
    }
}