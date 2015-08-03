<?php
use DataStructures\FixedArray;
use Tests\BaseTestCase;

class FixedArrayTest extends BaseTestCase{


    public function testConstructor($size=0, $type=FixedArray::TYPE_INT){
        
        $fixedArray = new FixedArray($size, $type);
        $this->assertInstanceOf("DataStructures\FixedArray",$fixedArray);
    }
}