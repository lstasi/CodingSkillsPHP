<?php
use DataStructures\FixedArray;
use Tests\BaseTestCase;

/**
 */
class FixedArrayTest extends BaseTestCase
{

    /**
     *
     * @param number $size            
     * @param number $type            
     */
    public function testConstructor($size = 0, $type = FixedArray::TYPE_INT)
    {
        $fixedArray = new FixedArray($size, $type);
        $this->assertInstanceOf("DataStructures\FixedArray", $fixedArray);
    }

    public function preLoaderMultipleValues()
    {
        $rtnArray = array(
            /*array(
                100,"linear"
            ),
            array(
                100,"bubble"
            ),
            array(
                100,"selection"
            ),*/
            array(
                10,
                "quick"
            )
        );
        return $rtnArray;
    }

    /**
     * 
     * @dataProvider preLoaderMultipleValues
     */
    public function testSort($count, $type)
    {
        $values = $this->preLoaderArrayDataProvider($count, 2, false);
        $fixedArray = new FixedArray($count, FixedArray::TYPE_INT);
        for ($i = 0; $i < $count; $i ++) {
            $this->assertEquals($i + 1, $fixedArray->addValue($values[$i]));
        }
        $this->log($fixedArray->printArray());
        $this->startTest(__METHOD__ . "Count: " . $count . " Type: " . $type);
        $fixedArray->sort($type);
        $this->endTest();
        $this->printComplexity();
        $this->log($fixedArray->printArray());
        sort($values);
        $sortedArray = "";
        for ($i = 0; $i < $count; $i ++) {
            $sortedArray .= $values[$i] . " ";
        }
        //$this->log($sortedArray);
        /*for ($i = 0; $i < $count; $i ++) {
            $this->assertEquals($values[$i], $fixedArray->getValue($i + 1));
        }*/
    }

    public function testAddValueInt()
    {
        $faker = Faker\Factory::create();
        $fixedArray = new FixedArray(5, FixedArray::TYPE_INT);
        $newValue = $faker->randomNumber(2);
        $idxPos = $fixedArray->addValue($newValue);
        $this->assertTrue(is_int($idxPos));
        $value = $fixedArray->getValue($idxPos);
        $this->assertEquals($newValue, $value);
    }

    /**
     */
    public function testAddValueString()
    {
        $faker = Faker\Factory::create();
        $fixedArray = new FixedArray(5, FixedArray::TYPE_STRING);
        $newValue = $faker->word;
        $idxPos = $fixedArray->addValue($newValue);
        $this->assertTrue(is_int($idxPos));
        $value = $fixedArray->getValue($idxPos);
        $this->assertEquals($newValue, $value);
    }

    public function preLoaderSize()
    {
        $rtnArray = array(
            array(
                10000
            ),
            array(
                20000
            ),
            array(
                40000
            )
        );
        return $rtnArray;
    }

    /**
     * testSetValue
     * @dataProvider preLoaderSize
     */
    public function testDuplicateSize($size)
    {
        $faker = Faker\Factory::create();
        
        $this->startTest(__METHOD__);
        
        $fixedArray = new FixedArray($size, FixedArray::TYPE_STRING);
        
        for ($i = 1; $i <= $size; $i ++) {
            $idxPos = $fixedArray->addValue($faker->word);
        }
        $this->assertEquals($idxPos, $size);
        $this->assertEquals($size, $fixedArray->getSize());
        $this->assertEquals($idxPos, $fixedArray->getCurrent());
        
        $idxPos = $fixedArray->addValue($faker->word);
        
        $this->assertEquals($idxPos, $size + 1);
        $this->assertEquals($size * 2, $fixedArray->getSize());
        $this->assertEquals($idxPos, $fixedArray->getCurrent());
        
        $this->endTest();
        $this->printComplexity();
    }

    /**
     * testRemove
     * @dataProvider preLoaderSize
     */
    public function testRemoveValue($size)
    {
        $faker = Faker\Factory::create();
        
        $fixedArray = new FixedArray($size, FixedArray::TYPE_INT);
        $arrayNumber = array();
        for ($i = 1; $i <= $size; $i ++) {
            $arrayNumber[] = $faker->randomDigit;
        }
        foreach ($arrayNumber as $value) {
            $fixedArray->addValue($value);
        }
        // Remove Random Index
        $idxRm = $faker->numberBetween(1, $size);
        
        unset($arrayNumber[$idxRm - 1]);
        $this->startTest(__METHOD__ . "Size: " . $size);
        $fixedArray->removeValue($idxRm);
        $this->endTest();
        $this->printComplexity();
        $i = 1;
        foreach ($arrayNumber as $number) {
            $this->assertEquals($fixedArray->getValue($i), $number);
            $i ++;
        }
    }
}