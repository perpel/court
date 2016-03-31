<?php

namespace common\components;
use common\components\Tree;
use common\components\Exception;

class ListTree extends Tree
{
    public $defaultOption = "";
    public $lKey;
    public $lNodeValue;
    public $lNodeLevel;

    public $prefix = "|";
    public $separation = "——";

    public function listTree()
    {
        $tree = [];
        if (!is_null($this->defaultOption)) {
            $tree[] = ["key" => 0, "option" => $this->defaultOption];
        }

        foreach ($this->tree as $node) {
            $l = $node[$this->lNodeLevel];
            while ($l > 0) {
                $node[$this->lNodeValue] = $this->separation . $node[$this->lNodeValue];
                $l--;
            }

            $tree[] = [
                "key" => $node[$this->lKey], 
                "option" => $this->prefix . $node[$this->lNodeValue]
            ];

        }
        return $tree;
    }
}

?>