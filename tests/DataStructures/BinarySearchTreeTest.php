<?php
use Tests\BaseTestCase;
use DataStructures\BinarySearchTree;

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

    public function preLoaderArrayDataProvider($valuesCount)
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $rtnArray = array();
        for ($i = 0; $i < $valuesCount; $i ++) {
            $rtnArray[] = $faker->randomNumber(2,true);
        }
        return $rtnArray;
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
        //print_r($BinarySearchTree);
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
}