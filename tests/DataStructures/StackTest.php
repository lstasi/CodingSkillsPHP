<?php
use Tests\BaseTestCase;
use DataStructures\Stack;

class StackTest extends BaseTestCase{
    
    /**
     */
    public function testConstructor(){
        $Stack = new Stack();
        $this->assertInstanceOf("DataStructures\Stack", $Stack);
    }
    /**
     * @param unknown $value
     */
    public function testAddValue(){
        $Stack = new Stack();
        $faker = Faker\Factory::create();
        $value = $faker->randomNumber(2,true);
        $this->assertTrue($Stack->push($value));
    }
    public function preLoaderMultipleValues()
    {
        $rtnArray = array(
            array(
                200
            )
        );
        return $rtnArray;
    }
    /**
     * @dataProvider preLoaderMultipleValues
     * @param int $count
     */
    public function testAddValues($count){
        
        $Stack = new Stack();
        
        $values = $this->preLoaderArrayDataProvider($count);
        $this->startTest(__METHOD__ . "Count: " . $count);
        foreach ($values as $value) {
            $this->assertTrue($Stack->push($value));
        }
        $this->endTest();
        $this->printComplexity();
        $reversedValues = array_reverse ($values);
        foreach ($reversedValues as $value) {
            $this->assertEquals($value,$Stack->pop());
        }
       
    }
}