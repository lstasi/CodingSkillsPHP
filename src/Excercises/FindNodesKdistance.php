<?php
namespace Excercises;
use DataStructures\TreeNode;

class findNodesKdistance
{

    public static function find(TreeNode $node, $distance)
    {
        $nodeQeueu = array();
        $nodesFound = "";
        //IF distance is reach return Node
        if ($distance == 0) {
            return $node->getValue();
        } else {
            //Add all nodes to queue array
            self::arrayPush($nodeQeueu,$node->getParent());
            self::arrayPush($nodeQeueu,$node->getLeftLeaf());
            self::arrayPush($nodeQeueu,$node->getRightLeaf());
            //Foreach node on the queue recurse traverse reducing the distance
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