<?php
namespace Excercises;

use DataStructures\BinarySearchTree;
use DataStructures\TreeNode;
// Find the in-order successor of a node in BST
class InOrderSuccessor
{

    public static function findInOrderSuccessor(TreeNode $node)
    {
        $parent = $node->getParent();
        
        if (is_null($parent)) {
            $inOrderParent = NULL;
        } else {
            $inOrderParent = self::traverseUpNodes($parent, $node->getValue());
        }
        
        $right = $node->getRightLeaf();
        if (is_null($right)) {
            $inOrderRight = NULL;
        } else {
            $inOrderRight = self::traverseDownNodes($right, $node->getValue());
        }
        
        if (is_null($inOrderParent)) {
            $inOrderNode = $inOrderRight;
        } elseif (is_null($inOrderParent)) {
            $inOrderNode = $inOrderParent;
        } else {
            if ($inOrderParent->getValue() > $inOrderRight->getValue()) {
                $inOrderNode = $inOrderRight;
            } else {
                $inOrderNode = $inOrderParent;
            }
        }
        return is_null($inOrderNode) ? new TreeNode(0) : $inOrderNode;
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
            return self::traverseUpNodes($node->getParent(), $value);
        } else {
            $leftNode = $node->getLeftLeaf();
            if (is_null($leftNode)) {
                return $node;
            } else {
                return self::traverseDownNodes($node->getLeftLeaf(), $value);
            }
        }
    }
}