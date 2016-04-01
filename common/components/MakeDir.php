<?php
namespace common\components;

use common\components\Exception;

class MakeDir {
    
	static public function create($path, $isMultiDir = true) {
		self::checkPath($path);
		return mkdir($path, 0777, $isMultiDir);
	}

	static public function checkPath($path) {
		if (is_dir($path)) {
			throw new Exception("101", "您所创建的目录已存在");
		}
	}

}