<?php
use Tests\BaseTestCase;
use DataStructures\BinarySearchTree;
use DataStructures\TreeNode;
use Excercises\InOrderSuccessor;

class InOrderSuccessorTest extends BaseTestCase
{

    /**
     * @group working
     *
     * @param number $count            
     */
    public function testFindSuccessor($count = 20)
    {
        $binarySearchTree = new BinarySearchTree();
        
        $values = $this->preLoaderArrayDataProvider($count);
        
        foreach ($values as $value) {
            $this->assertTrue($binarySearchTree->addValue($value));
        }
        $values = array_unique($values);
        $rndIdx = array_rand($values);
        $randomValue = $values[$rndIdx];
        $this->log("Random Value: " . $randomValue);
        sort($values);
        $inOrderValue = NULL;
        foreach ($values as $value) {
            if ($randomValue == $value) {
                $inOrderValue = current($values);
                break;
            }
        }
        $sortedArray = "";
        foreach ($values as $value) {
            $sortedArray .= $value . " ";
        }
        $this->log($sortedArray);
        
        $this->log("InOrder Value: " . $inOrderValue);
        $node = new TreeNode($randomValue);
        $nodeFound = $binarySearchTree->findNode($node);
        $this->startTest(__METHOD__ . "Count: $count ");
        $this->log("InOrder Found: " . InOrderSuccessor::findInOrderSuccessor($nodeFound)->getValue());
        // $this->assertEquals($inOrderValue, InOrderSuccessor::findInOrderSuccessor($nodeFound)->getValue());
        $this->endTest();
        $this->printComplexity();
        $binarySearchTree->printTree(7);
    }
}