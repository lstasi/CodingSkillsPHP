<?php
use Tests\BaseTestCase;
use DataStructures\BinaryTree;

class BinaryTreeTest extends BaseTestCase
{

    /**
     * @group working
     * 
     * @param unknown $value            
     */
    public function testAddValue()
    {
        $faker = Faker\Factory::create();
        $BinaryTree = new BinaryTree();
        $BinaryTree->addValue($faker->randomNumber(2));
    }

    /**
     */
    public function testSearchValue()
    {
        $faker = Faker\Factory::create();
        $BinaryTree = new BinaryTree();
        $randomNumber = $faker->randomNumber(2);
        $this->assertTrue($BinaryTree->addValue($randomNumber));
        $node = $BinaryTree->searchValue($randomNumber);
        $this->assertNotFalse($node);
        $this->assertEquals($randomNumber, $node->getValue());
    }

    public function preLoaderArrayDataProvider($valuesCount)
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $rtnArray = array();
        for ($i = 0; $i < $valuesCount; $i ++) {
            $rtnArray[] = $faker->randomNumber(2);
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
                10
            ),
            array(
                50
            ),
            array(
                100
            )
        );
        return $rtnArray;
    }

    /**
     * @group working
     * @dataProvider preLoaderMultipleValues
     *
     * @param int $value            
     */
    public function testAddValues($count)
    {
        $BinaryTree = new BinaryTree();
        
        $values = $this->preLoaderArrayDataProvider($count);
        $this->startTest(__METHOD__ . "Count: " . $count);
        foreach ($values as $value) {
            $this->assertTrue($BinaryTree->addValue($value));
        }
        $this->endTest();
        $this->printComplexity();
        //print_r($BinaryTree);
        $BinaryTree->printTree(50);
    }

    /**
     *
     * @dataProvider preLoaderMultipleValues
     *
     * @param int $value            
     */
    public function testSearchValues($count)
    {
        $BinaryTree = new BinaryTree();
        $values = $this->preLoaderArrayDataProvider($count);
        
        foreach ($values as $value) {
            $this->assertTrue($BinaryTree->addValue($value));
        }
        $this->startTest(__METHOD__ . "Count: " . $count);
        foreach ($values as $value) {
            $node = $BinaryTree->searchValue($value);
            $this->assertNotFalse($node);
            $this->assertEquals($value, $node->getValue());
        }
        $this->endTest();
        $this->printComplexity();
    }
}