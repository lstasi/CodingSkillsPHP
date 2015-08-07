<?php

use Tests\BaseTestCase;
use Excercises\Tamagotchi;


class TamagotchiTest extends BaseTestCase{
    
    /**
     * @group working
     */
    public function testFeeding(){
        $tamagotchi = new Tamagotchi(10);
        $hungriness = $tamagotchi->getHungriness();
        $tamagotchi->feed();
        $this->assertTrue($tamagotchi->getHungriness() < $hungriness);
    }
}