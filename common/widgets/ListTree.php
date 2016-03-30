<?php
namespace common\widgets;
use yii\base\Widget;


class ListTree extends Widget
{
    public $listTree = [];
    public $defaultOption = "";
    public $key;
    public $nodeValue;
    public $nodeLevel;

    public $prefix = "|";
    public $separation = "——";

    public function run()
    {
        $tree = [];
        if (!is_null($this->defaultOption)) {
            $tree[] = ["key" => 0, "option" => $this->defaultOption];
        }

        foreach ($this->listTree as $node) {
            $l = $node[$this->nodeLevel];
            while ($l > 0) {
                $node[$this->nodeValue] = $this->separation . $node[$this->nodeValue];
                $l--;
            }

            $tree[] = [
                "key" => $node[$this->key], 
                "option" => $this->prefix . $node[$this->nodeValue]
            ];

        }
        return $tree;
        //return $this->render('@common/components/views/widget/');
    }
}

?>