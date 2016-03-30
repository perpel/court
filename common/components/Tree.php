<?php
namespace common\components;

use common\components\Exception;
use yii\helpers\ArrayHelper;

/**
 * 
 * @property array $elements
 * @property integer $root
 */

class Tree {

	
	public $root;
	public $tree = [];

	private $elements = [];
	private $nodeKey;
	private $nodePostion;
	private $order;

	public function __construct(&$elements, $key, $nodePostion, $root = 0, $order = '') {
		$this->elements 	= $elements;
		$this->nodeKey  	= $key;
		$this->nodePostion	= $nodePostion;
		$this->order 		= $order;
		$this->root 		= $root;
		$this->generateRoot();
	}

	private function generateRoot() {
		if (empty($this->elements)) {return;}
		$rootNode = [];
		foreach ($this->elements as $key => $element) {
			if ($element[$this->nodePostion] == $this->root) {
				$rootNode[] = $element;
				unset($this->elements[$key]);
			}
		}
		$level = 0;
		$this->generateTree($this->orderNodes($rootNode), $level);
	}

	private function generateTree($nodes, $level) {
		if (empty($nodes)) {return;}
		$level++;
		foreach ($nodes as $n) {
			$n["level"] = $level;
			$this->tree[] = $n;
			$parentNode = $n[$this->nodeKey];
			$this->generateTree($this->generateNode($parentNode), $level);
		}
	}

	private function generateNode($parentNode) {
		if (empty($this->elements)) {return [];}
		$nodes = [];
		foreach ($this->elements as $key => $element) {
			if ($element[$this->nodePostion] == $parentNode) {
				$nodes[] = $element;
				unset($this->elements[$key]);
			}
		}
		return $this->orderNodes($nodes);
	}

	private function orderNodes($nodes) {
		ArrayHelper::multisort($nodes, [$this->order], [SORT_ASC]);
		return $nodes;
	}

}