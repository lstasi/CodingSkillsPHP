<?php
use Tests\BaseTestCase;
use DataStructures\BinaryTree;

class BinaryTreeTest extends BaseTestCase
{

    /**
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
        $BinaryTree->printTree(5);
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