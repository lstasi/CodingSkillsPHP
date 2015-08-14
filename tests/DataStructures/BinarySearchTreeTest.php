<?php
use Tests\BaseTestCase;
use DataStructures\BinarySearchTree;
use DataStructures\TreeNode;

class BinarySearchTreeTest extends BaseTestCase
{

    /**
     * 
     * @param unknown $value            
     */
    public function testAddValue()
    {
        $faker = Faker\Factory::create();
        $BinarySearchTree = new BinarySearchTree();
        $BinarySearchTree->addValue($faker->randomNumber(2));
    }

    /**
     */
    public function testSearchValue()
    {
        $faker = Faker\Factory::create();
        $BinarySearchTree = new BinarySearchTree();
        $randomNumber = $faker->randomNumber(2);
        $this->assertTrue($BinarySearchTree->addValue($randomNumber));
        $node = $BinarySearchTree->searchValue($randomNumber);
        $this->assertNotFalse($node);
        $this->assertEquals($randomNumber, $node->getValue());
    }

    public function data10Array()
    {
        return $this->preLoaderArrayDataProvider(10);
    }

    public function preLoaderMultipleValues()
    {
        $rtnArray = array(
            array(
                20
            )
        );
        return $rtnArray;
    }

    /**
     * @dataProvider preLoaderMultipleValues
     *
     * @param int $value            
     */
    public function testAddValues($count)
    {
        $BinarySearchTree = new BinarySearchTree();
        
        $values = $this->preLoaderArrayDataProvider($count);
        $this->startTest(__METHOD__ . "Count: " . $count);
        foreach ($values as $value) {
            $this->assertTrue($BinarySearchTree->addValue($value));
        }
        $this->endTest();
        $this->printComplexity();
        $BinarySearchTree->printTree(5);
    }

    /**
     *
     * @dataProvider preLoaderMultipleValues
     *
     * @param int $value            
     */
    public function testSearchValues($count)
    {
        $BinarySearchTree = new BinarySearchTree();
        $values = $this->preLoaderArrayDataProvider($count);
        
        foreach ($values as $value) {
            $this->assertTrue($BinarySearchTree->addValue($value));
        }
        $this->startTest(__METHOD__ . "Count: " . $count);
        foreach ($values as $value) {
            $node = $BinarySearchTree->searchValue($value);
            $this->assertNotFalse($node);
            $this->assertEquals($value, $node->getValue());
        }
        $this->endTest();
        $this->printComplexity();
    }
    /**
     */
    public function testFindNode($count=20){
    
        $binarySearchTree = new BinarySearchTree();
    
        $values = $this->preLoaderArrayDataProvider($count);
    
        foreach ($values as $value) {
            $this->assertTrue($binarySearchTree->addValue($value));
        }
        $lastValue = end($values);
        $node = new TreeNode($lastValue);
        $this->startTest(__METHOD__ . "Count: $count ");
        $nodeFound=$binarySearchTree->findNode($node);
        $this->endTest();
        $this->printComplexity();
        $this->assertEquals($lastValue, $nodeFound->getValue());
    }
}