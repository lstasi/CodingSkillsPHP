<?php

namespace Excercises;

class Tamagotchi{
    
    
    private $hungriness;
    
    public function __construct($hungriness=100){
        $this->hungriness=$hungriness;
    }
    
    public function getHungriness(){
        return $this->hungriness;
    }
    
    public function feed(){
        $this->hungriness--;
    }
}