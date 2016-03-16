<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p style="font-family: '微软雅黑'; padding-left: 10px;">
        web请求在处理该页面时产生错误，如果您认为这是一个服务器错误，请联系我们。
    </p>

</div>
