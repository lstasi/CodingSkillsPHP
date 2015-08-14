<?php
use Tests\BaseTestCase;
use Excercises\findNodesKdistance;
use DataStructures\BinarySearchTree;
use DataStructures\TreeNode;

class FindNodesKdistanceTest extends BaseTestCase
{

    /**
     */
    public function testFind()
    {
        //Create Binary tree
        $binarySearchTree = new BinarySearchTree($count = 20);
        //Create random array of values
        $values = $this->preLoaderArrayDataProvider($count);
        //Add values to tree
        foreach ($values as $value) {
            $this->assertTrue($binarySearchTree->addValue($value));
        }
        //Remove duplicates, binary tree ignores them
        $values = array_unique($values);
        //Get Random value from array
        $rndIdx = array_rand($values);
        $randomValue = $values[$rndIdx];
        $this->log("Random Value: " . $randomValue);
        //Create node from Random Value
        $node = new TreeNode($randomValue);
        //Get Node from tree
        $nodeFound = $binarySearchTree->findNode($node);
        $this->log("Node Found in tree: ".$nodeFound->getValue());
        //Find k distance Nodes
        $nodesFounded = findNodesKdistance::find($nodeFound, 2);
        $this->log("Nodes Found: " . $nodesFounded);
        $binarySearchTree->printTree(7);
    }
}