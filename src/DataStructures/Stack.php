<?php
namespace DataStructures;

class Stack
{
    /**
     * Internal Double Linked List
     * @var DoubleLinkedList
     */
    private $doubleLinkedList;

    public function __construct()
    {
        $this->doubleLinkedList = new DoubleLinkedList();
    }

    public function push($value)
    {
        return $this->doubleLinkedList->pushValue($value);
    }

    public function pop()
    {
        return $this->doubleLinkedList->removeFirstValue();
    }
}