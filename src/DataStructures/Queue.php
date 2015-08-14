<?php
namespace DataStructures;

class Queue
{
    /**
     * Interanl Double Linked List
     * @var DoubleLinkedList
     */
    private $doubleLinkedList;

    public function __construct()
    {
        $this->doubleLinkedList = new DoubleLinkedList();
    }

    public function queuein($value)
    {
        return $this->doubleLinkedList->addValue($value);
    }

    public function dequeue()
    {
        return $this->doubleLinkedList->removeFirstValue();
    }
}