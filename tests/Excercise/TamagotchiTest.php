<?php

use Tests\BaseTestCase;
use Excercises\Tamagotchi;


class TamagotchiTest extends BaseTestCase{
    
    /**
     * 
     */
    public function testFeeding(){
        //Create Tamagotchi
        $tamagotchi = new Tamagotchi(10);
        //Get previous hungriness for assert
        $hungriness = $tamagotchi->getHungriness();
        //Feed Tamagotchi
        $tamagotchi->feed();
        //Check if hungriness has decrease
        $this->assertTrue($tamagotchi->getHungriness() < $hungriness);
    }
}