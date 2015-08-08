<?php
namespace DataStructures;

class BinaryTree
{

    /**
     *
     * @var TreeNode
     */
    private $rootNode;

    /**
     *
     * @var TreeNode
     */
    private $lastNode;

    /**
     *
     * @var $insertQueue Queue
     */
    private $insertQueue;

    public function __construct()
    {
        $this->rootNode = NULL;
        $this->insertQueue = new Queue();
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

    public function _addNode(TreeNode $node)
    {
        if ($this->rootNode == NULL) {
            $this->rootNode = $node;
            $this->lastNode = $node;
        } else {
            $this->getLastNode()->addLeaf($node);
        }
        $this->insertQueue->queue($node);
    }

    protected function getLastNode()
    {
        if ($this->lastNode->getRightLeaf()!=NULL) {
            $this->lastNode = $this->insertQueue->dequeue();
        }
        return $this->lastNode;
    }

    public function printTree($level)
    {
        $data[0] = array();
        $data[0][] = $this->rootNode;
        for ($i = 1; $i < $level; $i ++) {
            $data[$i] = array();
            foreach ($data[$i - 1] as $node) {
                /**
                 *
                 * @var TreeNode
                 */
                $leftNode = $node->getLeftLeaf();
                if ($leftNode) {
                    $data[$i][] = $leftNode;
                }
                /**
                 *
                 * @var TreeNode
                 */
                $rightNode = $node->getRightLeaf();
                if ($rightNode)
                    $data[$i][] = $rightNode;
            }
        }
        echo "\n";
        $i=count($data);
        foreach($data as $line){
        	echo str_repeat(" ",$i);
        	foreach($line as $node){
        		echo str_repeat(" ",$i/10);
        		echo $node->getValue();
        	}
        	$i--;
        	echo "\n";
        }
    }
}