<?php
namespace DataStructures;

class TreeNode
{

    /**
     * Parent Node
     * @var TreeNode
     */
    private $parent;

    /**
     * Left Leaf Nod
     * @var TreeNode
     */
    private $leftLeaf;

    /**
     * Rgiht Leaf Node
     * @var TreeNode
     */
    private $rightLeaf;

    /**
     *
     * @var TreeNode
     */
    private $data;

    public function __construct($value)
    {
        $this->leftLeaf = NULL;
        $this->rightLeaf = NULL;
        $this->data = $value;
    }

    public function setRightLeaf(TreeNode $node)
    {
        $this->rightLeaf = $node;
    }

    public function setLeftLeaf(TreeNode $node)
    {
        $this->leftLeaf = $node;
    }

    public function getRightLeaf()
    {
        return $this->rightLeaf;
    }

    public function getLeftLeaf()
    {
        return $this->leftLeaf;
    }

    public function setParent(TreeNode $node)
    {
        $this->parent = $node;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getValue()
    {
        return $this->data;
    }

    public function addLeaf(TreeNode $node)
    {
        //Add Node to the left if empty
        if (is_null($this->leftLeaf)) {
            $this->leftLeaf = $node;
        //Else add node to the right
        } elseif (is_null($this->rightLeaf)) {
            $this->rightLeaf = $node;
        } else {
            return false;
        }
    }
}