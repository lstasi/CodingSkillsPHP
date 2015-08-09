<?php
namespace DataStructures;

class Stack
{

    private $doubleLinkedList;

    public function __construct()
    {
        $this->doubleLinkedList = new DoubleLinkedList();
    }

    public function push($value)
    {
        $this->doubleLinkedList->pushValue($value);
    }

    public function pop()
    {
        return $this->doubleLinkedList->removeFirstValue();
    }
}