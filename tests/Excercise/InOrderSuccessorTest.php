<?php
use Tests\BaseTestCase;
use DataStructures\BinarySearchTree;
use DataStructures\TreeNode;
use Excercises\InOrderSuccessor;

class InOrderSuccessorTest extends BaseTestCase
{

    
    public function preLoaderMultipleValues()
    {
        $rtnArray = array(
            array(
                100
            ),
            array(
                500
            ),
            array(
                1000
            )
        );
        return $rtnArray;
    }
    
    /**
     * @dataProvider preLoaderMultipleValues
     * @param number $count            
     */
    public function testFindSuccessor($count = 20)
    {
        //Create Binary tree
        $binarySearchTree = new BinarySearchTree();
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
        //Select Random Value
        $randomValue = $values[$rndIdx];
        //$this->log("Random Value: " . $randomValue);
        
        //Sort Values in the array
        sort($values);
        $inOrderValue = NULL;
        //Search for in order succesor in the array
        foreach ($values as $value) {
            if ($randomValue == $value) {
                $inOrderValue = current($values);
                break;
            }
        }
        $sortedArray = "";
        //Print sorted array
        foreach ($values as $value) {
            $sortedArray .= $value . " ";
        }
        //$this->log($sortedArray);
        
        //$this->log("InOrder Value: " . $inOrderValue);
        //Create node from Random Value        
        $node = new TreeNode($randomValue);

        $this->startTest(__METHOD__ . "Count: $count ");
        //Search in order Succesor
        $nodeFound = $binarySearchTree->findNode($node);
        //$this->log("InOrder Found: " . InOrderSuccessor::findInOrderSuccessor($nodeFound)->getValue());
        $this->assertEquals($inOrderValue, InOrderSuccessor::findInOrderSuccessor($nodeFound)->getValue());
        $this->endTest();
        $this->printComplexity();
        //$binarySearchTree->printTree(8);
    }
}