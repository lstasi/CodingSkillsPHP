<?php
namespace Excercises;
use DataStructures\TreeNode;

class findNodesKdistance
{

    public static function find(TreeNode $node, $distance)
    {
        $nodeQeueu = array();
        $nodesFound = "";
        
        if ($distance == 0) {
            return $node->getValue();
        } else {
            self::arrayPush($nodeQeueu,$node->getParent());
            self::arrayPush($nodeQeueu,$node->getLeftLeaf());
            self::arrayPush($nodeQeueu,$node->getRightLeaf());
            
            foreach ($nodeQeueu as $nodeInQueue) {
                $nodesFound .= self::find($nodeInQueue, $distance - 1)." ";
            }
            return $nodesFound;
        }
    }
    public static function  arrayPush(&$arrayInput,$data){
        if(!is_null($data)){
            array_push($arrayInput,$data);
        }
    }
}