<?php

namespace common\components\register;

use common\components\register\Code;


final class License implements Code{

	public $beginDate;
	public $endDate;
	public $errorMsg;
	public $operation = "ENCODE";
	public $code;

	public function __construct($code_str = "") {
		if (!empty($code_str)) {
			$this->code = $code_str;
			$this->validate();
			return;
		}
		$this->generateCode();
	}

    // regiter court
	private function generateCode() {
		// 生成注册码
        $this->code = $this->authcode($this->authcodeStr('insert'), 'ENCODE', 0);
        $this->beginDate = date("Y-m-d");
        $this->endDate = date("Y-m-d", strtotime($this->beginDate . "+" . self::EXPIRE . " day"));
    }

    private function validate($code) {
    	try {
    		// 是否为空
    		$this->isEmpty();
    		// 验证是否注册码存在及注册码有效性
    		$this->isEffective();
    		$this->isExist();
    	} catch(Exception $e) {
    		$this->errorMsg = $e->getMessage();
    		return false;
    	}
    	return true;
    }

    // ****************************//
    private function isEmpty() {
    	if (empty($this->code))
    		throw new Exception("注册码不能为空", 1);		
    }

    private function isEffective() {
    	if (Yii::$app->cache->get($this->code))
    		throw new Exception("无效注册码", 1);	
    }

    private function isExist() {
        if(empty($this->authcode($this->code, 'DECODE', 0)))
        	throw new Exception("无效注册码", 1);
    }

    
    // **************************//

    final private function authcodeStr($oper) {
    	return $oper . ":" . self::EXPIRE . ":date('Y-m-d G:i:s')";
    }

    //*****************************************************//
    final public static function authcodeArr($code) {
    	// 通过注册码返回注册信息数组
    	return explode(":", $this->authcode($code, 'DECODE', 0));
    }

    final public static function isExpired($code, $start, $end) {
    	$e = Liscense::$authcodeArr($code);
    	$eStartDate = date('Y-m-d', strtotime(end($e)));
    	$eExpire 	= $e[1];
    	$eEndDate 	= date("Y-m-d", strtotime($eStartDate . "+" . $eExpire . " day"));
    	if (!($start == $eStartDate && $end == $eEndDate)) {
    		throw new common\components\Exception("201", "您登陆的法院已过期");
    	}
    }

	final private function authcode($string, $operation = 'DECODE', $expiry = 0) {   
        // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙   
        $ckey_length = self::CKEY_LENGTH;     
        // 密匙   
        $key = self::LISCENSE_CODE;     
        // 密匙a会参与加解密   
        $keya = md5(substr($key, 0, 16));
        // 密匙b会用来做数据完整性验证   
        $keyb = md5(substr($key, 16, 16));
        // 密匙c用于变化生成的密文   
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length):substr(md5(microtime()), -$ckey_length)) : '';   
        // 参与运算的密匙   
        $cryptkey = $keya.md5($keya . $keyc);   
        $key_length = strlen($cryptkey);   
        // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)， 
    	// 解密时会通过这个密匙验证数据完整性   
        // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确   
        $string = ($operation == 'DECODE') ? base64_decode(substr($string, $ckey_length)):sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;   
        $string_length = strlen($string);   
        $result = '';   
        $box = range(0, 255);   
        $rndkey = array();   
        // 产生密匙簿   
        for($i = 0; $i <= 255; $i++) {   
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);   
        }   
        // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度   
        for ($j = $i = 0; $i < 256; $i++) {   
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;   
            $tmp = $box[$i];   
            $box[$i] = $box[$j];   
            $box[$j] = $tmp;   
        }   
        // 核心加解密部分   
        for ($a = $j = $i = 0; $i < $string_length; $i++) {   
            $a = ($a + 1) % 256;   
            $j = ($j + $box[$a]) % 256;   
            $tmp = $box[$a];   
            $box[$a] = $box[$j];   
            $box[$j] = $tmp;   
            // 从密匙簿得出密匙进行异或，再转成字符   
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));   
        }   
        if($operation == 'DECODE') {  
            // 验证数据有效性，请看未加密明文的格式   
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) &&  substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {   
                return substr($result, 26);   
            } else {   
                return '';   
            }   
        } else {   
            // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因   
            // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码   
            return $keyc.str_replace('=', '', base64_encode($result));   
        }   
    } 
}