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
        $binarySearchTree = new BinarySearchTree($count = 20);
        
        $values = $this->preLoaderArrayDataProvider($count);
        
        foreach ($values as $value) {
            $this->assertTrue($binarySearchTree->addValue($value));
        }
        
        $values = array_unique($values);
        $rndIdx = array_rand($values);
        $randomValue = $values[$rndIdx];
        $this->log("Random Value: " . $randomValue);
        $node = new TreeNode($randomValue);
        $nodeFound = $binarySearchTree->findNode($node);
        $this->log("Node Found in tree: ".$nodeFound->getValue());
        $nodesFounded = findNodesKdistance::find($nodeFound, 2);
        /*$nodeList = "";
        foreach ($nodesFounded as $nodeK) {
            $nodeList .= $nodeK->getValue()." ";
        }*/
        $this->log("Nodes Found: " . $nodesFounded);
        $binarySearchTree->printTree(7);
    }
}