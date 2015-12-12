<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <h1><a href="#">测试法院  <small>20032</small></a></h1>
    <?= $this->render("nav-bar");?>
</div>

<div class="deputy">
    <div class="breadcrumbs">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>

    <div class="login-msg">
        <span class="welcom">
            （1234）楼小坚，欢迎登录系统，当前时间：<?=date("Y-m-d G:i")?>
        </span>
        | <span><a href="#">退出</a></span>
    </div>

    <div id="notice">
       <span></span> 
    </div>
    
</div>

<div class="wrap">

   <!--  <div class="main-court">
        <img src="<?php Yii::getAlias("@uploads")?>/court/default.jpg" alt="">
    </div> -->

    <div class="container">
        <div id="section-bar">
        <ul class="fnt-ul">
        <li class="fnt ico-refesh"><span onclick="javascript:location.reload()">刷新</span></li>
        <?=$this->blocks["bar"];?>
        </ul>    
    </div>
        
        <?= $content ?>
    </div>
</div>

<div class="footer">
    <div class="container">
        &copy; 人民法院<?= date('Y') ?>&nbsp;&nbsp;
        <?= Yii::powered() ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
