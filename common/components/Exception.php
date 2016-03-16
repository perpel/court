<?php

namespace common\components;

use yii\base\UserException;
use common\components\ExceptionStatus;

class Exception extends UserException
{

    public $statusCode;

    public function __construct($status, $message = null, $code = 0, \Exception $previous = null)
    {
        $this->statusCode = $status;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        if (isset(ExceptionStatus::$statuses[$this->statusCode])) {
            return ExceptionStatus::$statuses[$this->statusCode];
        } else {
            return 'Error';
        }
    }
}
