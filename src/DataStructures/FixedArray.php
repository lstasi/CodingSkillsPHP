<?php
namespace DataStructures;

class FixedArray
{

    const TYPE_INT = 101;

    const TYPE_STRING = 201;

    private $size = 0;

    private $type = 0;

    private $current = 0;

    public function __construct($size, $type)
    {
        $this->size = $size;
        $this->type = $type;
        $this->initialize();
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function addValue($value)
    {
        if ($this->current == $this->size) {
            $this->duplicateSize();
        } else {
            $this->current ++;
        }
        $this->{$this->current} = $value;
        return $this->current;
    }

    public function getValue($idx)
    {
        $value = $this->{$idx};
        return $value;
    }

    public function setValue($idx, $value)
    {
        $this->{$idx} = $value;
        return true;
    }

    public function removeValue($idx)
    {
        for ($i = $idx; $i < $this->size; $i ++) {
            $this->{$i} = $this->{$i + 1};
        }
        $this->{$this->size} = $this->initializeValue();
        return true;
    }

    public function searchValue($value, $type = "linear")
    {
        switch ($type) {
            case "linear":
                $rtnValue = $this->_searchLinear($value);
                break;
            default:
                throw new Exception("Search method not found");
        }
        return $rtnValue;
    }

    public function sort($type = "selection")
    {
        switch ($type) {
            case "linear":
                $rtnValue = $this->_sortLinear();
                break;
            case "selection":
                $rtnValue = $this->_sortSelection();
                break;
            case "bubble":
                $rtnValue = $this->_sortBubble();
                break;
            case "quick":
                $rtnValue = $this->_sortQuick(1, $this->size);
                break;
            default:
                throw new Exception("Search method not found");
        }
        return $rtnValue;
    }

    private function _sortQuick($left, $right)
    {
        $pivot = $right;
        $pivotValue = $this->{$pivot};
        echo "Pivot is: " . $pivotValue . "\n";
        // $this->_swapValues($pivot, $right);
        $right --;
        $continue = true;
        $counter = 0;
        while ($continue) {
            echo $this->printArray() . "\n";
            echo "Search from Left: " . $left . "\n";
            for ($i = $left; $i <= $right; $i ++) {
                $left = $i;
                if ($pivotValue <= $this->{$i}) {
                    break;
                }
            }
            /*if ($left == $right) {
                // Reach the end Pivot is Min
                echo "Break Left: " . $left . " Pivot: " . ($right + 1) . "\n";
                $this->_swapValues($left, $right + 1);
                break;
            }*/
            echo "Search from Right: " . $right . "\n";
            for ($j = $right; $j >= $left; $j --) {
                $right = $j;
                if ($pivotValue >= $this->{$j}) {
                    break;
                }
            }
            if ($right == $left) {
                // Reach the begining Pivot is Max
                echo "Break: " . ($left+1) . " Pivot: " . $pivot . "\n";
                $this->_swapValues($left+1, $pivot);
                break;
            }
            echo "Swap Left: " . $left . " Right: " . $right . "\n";
            $this->_swapValues($left, $right);
            $left ++;
            $right --;
            $counter ++;
            if ($counter > 100) {
                $continue = false;
            }
        }
        $this->_sortQuick(1, $left);
        $this->_sortQuick($left, $right + 1);
    }

    private function _sortBubble()
    {
        for ($i = 1; $i < $this->size; $i ++) {
            // Set Sorted Flag
            $sorted = true;
            for ($j = 1; $j < $this->size; $j ++) {
                if ($this->{$j} > $this->{$j + 1}) {
                    $this->_swapValues($j, $j + 1);
                    // If swap is made list wasn't sorted
                    $sorted = false;
                }
            }
            // If List is Sorted breakout
            if ($sorted) {
                break;
            }
        }
        return true;
    }

    private function _sortSelection()
    {
        for ($i = 1; $i < $this->size; $i ++) {
            $idxMin = $this->_findMin($i);
            $this->_swapValues($idxMin, $i);
        }
        return true;
    }

    private function _findMin($start = 1)
    {
        $currentMin = $start;
        for ($i = $start + 1; $i <= $this->size; $i ++) {
            if ($this->{$currentMin} > $this->{$i}) {
                $currentMin = $i;
            }
        }
        return $currentMin;
    }

    private function _sortLinear()
    {
        for ($i = 1; $i <= $this->size; $i ++) {
            for ($j = 1; $j <= $this->size; $j ++) {
                if ($this->{$i} < $this->{$j}) {
                    $this->_swapValues($i, $j);
                }
            }
        }
        return true;
    }

    private function _swapValues($idxDest, $idxSrc)
    {
        $temp = $this->{$idxDest};
        $this->{$idxDest} = $this->{$idxSrc};
        $this->{$idxSrc} = $temp;
    }

    private function _searchLinear($value)
    {
        $rtnIdx = false;
        for ($i = 1; $i <= $this->size; $i ++) {
            if ($this->{$i} == $value) {
                $rtnIdx = $i;
                break;
            }
        }
        return $rtnIdx;
    }

    private function _searchBinary($value)
    {}

    private function duplicateSize()
    {
        $oldSize = $this->size;
        $this->size *= 2;
        for ($i = $oldSize; $i <= $this->size; $i ++) {
            $this->{$i} = $this->initializeValue();
        }
        // $this->current=$oldSize+1;
    }

    private function initialize()
    {
        if ($this->size) {
            for ($i = 1; $i <= $this->size; $i ++) {
                $this->{$i} = $this->initializeValue();
            }
        }
        $this->current = 0;
    }

    private function initializeValue()
    {
        switch ($this->type) {
            case FixedArray::TYPE_INT:
                $rtnValue = 0;
                break;
            case FixedArray::TYPE_STRING:
                $rtnValue = "";
            default:
                $rtnValue = NULL;
        }
        return $rtnValue;
    }

    public function printArray()
    {
        $rtnStr = "";
        for ($i = 1; $i <= $this->size; $i ++) {
            $rtnStr .= $this->{$i} . " ";
        }
        return $rtnStr;
    }
}