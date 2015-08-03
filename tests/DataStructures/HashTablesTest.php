<?php 
use DataStructures\HashTables;
use Tests\BaseTestCase;

class HashTablesTest extends BaseTestCase{
    
    
    public function testConstructor(){
        $hashTable = new HashTables();
        $this->assertInstanceOf("DataStructures\HashTables",$hashTable);
    }
    public function preLoaderArrayDataProvider($valuesCount){
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create();
        $rtnArray = array();
        for($i=0; $i < $valuesCount; $i++){
            $rtnArray[]=array($faker->randomLetter,$faker->randomDigit);
        }
        return  $rtnArray;
    }
    public function preLoader1Value(){
        return $this->preLoaderArrayDataProvider(1);
    }
    public function preLoaderMultipleValues(){
        
        $rtnArray = array(array(10000),array(100000),array(1000000));
        return  $rtnArray;
    }
    /** testSetValue
     * @dataProvider   preLoader1Value
     */
    public function testSetValue($key,$value){
        
        $this->startTest(__METHOD__);

        $hashTable = new HashTables();
        
        $this->assertTrue($hashTable->setValue($key,$value));
        
        $this->endTest();
        $this->printComplexity();
        
    }
    /** testMultiSetValues
     * @dataProvider   preLoaderMultipleValues
     */
    public function testMultiSetValues($count){
    
        $hashTable = new HashTables();
        $dataProvider = $this->preLoaderArrayDataProvider($count);
        
        $this->startTest(__METHOD__ . "Count: ".$count);
        foreach($dataProvider as $data){
            $this->assertTrue($hashTable->setValue($data[0],$data[1]));
        }
        $this->endTest();
        $this->printComplexity();
    
    }
}

?>