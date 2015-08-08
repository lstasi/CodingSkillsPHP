<?php
namespace DataStructures;

class ListNode
{

    private $nextNode;

    private $previousNode;

    private $data;

    public function __construct($value)
    {
        $this->nextNode = NULL;
        $this->previousNode = NULL;
        $this->data = $value;
    }

    public function setNextNode(ListNode $node)
    {
        $this->nextNode = $node;
    }

    public function getNextNode()
    {
        return $this->nextNode;
    }

    public function setPreviousNode(ListNode $node)
    {
        $this->previous = $node;
    }

    public function getPreviousNode()
    {
        return $this->previous;
    }

    public function getValue()
    {
        return $this->data;
    }
}