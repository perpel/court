<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="navbar">
        
    <h1>后台管理系统</h1>
    
    <ul class="nav">
        <li><a href="<?=Yii::$app->request->hostInfo?>/court/frontend/web/index.php">首页</a></li>
        <li><a href="index.php?r=court/index">法院管理</a></li>
        <li><a href="#">BB</a></li>
        <li>
        <?php
            if (Yii::$app->user->isGuest) {
                echo '<a href="index.php?r=site/login">登录</a>';
            } else {
                echo '<a href="index.php?r=site/logout">登出(' . Yii::$app->user->identity->username . ')</a>';
            }
        ?>
        </li>
    </ul>


</div>



<!-- <div class="deputy">
    <div class="breadcrumbs">
        <?php //Breadcrumbs::widget([
            //'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        //]) //?>
    </div>

    <div id="notice">
       <span></span> 
    </div>
    
</div> -->




<div class="wrap">
    
    

    <div class="container">
        <div id="section-bar">
            <ul class="fnt-ul">
            <li class="fnt ico-refesh"><span onclick="javascript:location.reload()">刷新</span></li>
            <?=$this->blocks["bar"];?>
            </ul>
        </div>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<div class="footer">

        &copy; My Company <?= date('Y') ?> &nbsp;&nbsp;<?= Yii::powered() ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
