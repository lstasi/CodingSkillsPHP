<?php
use Tests\BaseTestCase;
use DataStructures\Queue;

class QueueTest extends BaseTestCase{
    
    /**
     */
    public function testConstructor(){
        $queue = new Queue();
        $this->assertInstanceOf("DataStructures\Queue", $queue);
    }
    /**
     * @param unknown $value
     */
    public function testAddValue(){
        $queue = new Queue();
        $faker = Faker\Factory::create();
        $value = $faker->randomNumber(2,true);
        $this->assertTrue($queue->queuein($value));
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
        
        $queue = new Queue();
        
        $values = $this->preLoaderArrayDataProvider($count);
        $this->startTest(__METHOD__ . "Count: " . $count);
        foreach ($values as $value) {
            $this->assertTrue($queue->queuein($value));
        }
        $this->endTest();
        $this->printComplexity();
        foreach ($values as $value) {
            $this->assertEquals($value,$queue->dequeue());
        }
       
    }
}