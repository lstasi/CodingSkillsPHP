<?php
namespace DataStructures;

class BinaryTree
{

    /**
     *
     * @var TreeNode
     */
    protected $rootNode;

    /**
     *
     * @var TreeNode
     */
    protected $lastNode;

    /**
     *
     * @var $insertQueue Queue
     */
    protected $insertQueue;

    public function __construct()
    {
        $this->rootNode = NULL;
        $this->insertQueue = new Queue();
    }

    public function getRootNode()
    {
        return $this->rootNode;
    }

    public function addValue($value)
    {
        /**
         *
         * @var TreeNode
         */
        $node = new TreeNode($value);
        $this->_addNode($node);
        return true;
    }

    protected function _addNode(TreeNode $node)
    {
        if ($this->rootNode == NULL) {
            $this->rootNode = $node;
            $this->lastNode = $node;
        } else {
            //Get last empty Node
            $this->_getLastNode()->addLeaf($node);
        }
        //Add node to the insert queue
        $this->insertQueue->queuein($node);
    }

    protected function _getLastNode()
    {
        //If current last node right is not empty get new Node from queue
        if ($this->lastNode->getRightLeaf() != NULL) {
            $this->lastNode = $this->insertQueue->dequeue();
        }
        return $this->lastNode;
    }

    public function printTree($level)
    {
        $data[0] = array();
        $data[0][] = $this->rootNode;
        //Iterare all nodes push to array
        for ($i = 1; $i < $level; $i ++) {
            if (isset($data[$i - 1])) {
                foreach ($data[$i - 1] as $node) {
                    /**
                     *
                     * @var TreeNode
                     */
                    $leftNode = $node->getLeftLeaf();
                    if ($leftNode) {
                        $data[$i][] = $leftNode;
                    } else {
                        $data[$i][] = new TreeNode("  ");
                    }
                    /**
                     *
                     * @var TreeNode
                     */
                    $rightNode = $node->getRightLeaf();
                    if ($rightNode) {
                        $data[$i][] = $rightNode;
                    } else {
                        $data[$i][] = new TreeNode("  ");
                    }
                }
            }
        }
        echo "\n";
        $lines = count($data);
        $maxNodes = pow(2, ($lines - 1));
        $maxLineSize = $maxNodes * 4;
        $i = 1;
        foreach ($data as $line) {
            $nodesLine = pow(2, ($i - 1));
            $lineSize = $nodesLine * 4;
            $linePos = ($maxLineSize / 2) - ($lineSize / 2);
            // Center Line
            // echo str_repeat(" ", ($maxLineSize / 2) - ($lineSize / 2));
            $nodeSpacing = (($maxLineSize - $lineSize) / $nodesLine) / 2;
            foreach ($line as $node) {
                echo str_repeat(" ", 1 + $nodeSpacing);
                echo "" . $node->getValue();
                echo str_repeat(" ", 1 + $nodeSpacing);
            }
            $i ++;
            echo "\n";
        }
    }
}