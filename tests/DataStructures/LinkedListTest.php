<?php

use Tests\BaseTestCase;
use DataStructures\LinkedList;

class LinkedListTest extends BaseTestCase{
    
    
    
    
    /**
     * @param unknown $value
     */
    public function testAddValue(){
        $faker = Faker\Factory::create();
        $linkedList = new LinkedList();
        $linkedList->addValue($faker->randomNumber(2));
    }
    public function preLoaderArrayDataProvider($valuesCount=10){
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $rtnArray = array();
        for($i=0; $i < $valuesCount; $i++){
            $rtnArray[]=array($faker->randomNumber(2));
        }
        return  $rtnArray;
    }
    /**
     * @dataProvider preLoaderArrayDataProvider
     * @param unknown $value
     */
    public function testAddValues($value){
        $linkedList = new LinkedList();
        $linkedList->addValue($value);
    }
}