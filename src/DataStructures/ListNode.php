<?php
namespace DataStructures;

class ListNode
{
    /**
     * Next node in the list
     * @var ListNode
     */
    private $nextNode;
    /**
     * Previous node in the list
     * @var ListNode
     */
    private $previousNode;
    /**
     * Internal Data value
     */
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