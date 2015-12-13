<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\HomeAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

HomeAsset::register($this);
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
        
    <h1>委托案件电子管理系统</h1>
    
    <ul class="nav">
    	<li>
        <?php
            if (Yii::$app->user->isGuest) {
                echo '<a href="index.php?r=site/login">登录</a>';
            } else {
                echo '<a href="index.php?r=site/logout">登出(' . Yii::$app->user->identity->username . ')</a>';
            }
        ?>
        </li>
    	<li> | </li>
        <li><a href="index.php?r=register">法院注册</a></li>
        
        <li><a target="_blank" href="<?=Yii::$app->request->hostInfo?>/court/backend/web/index.php">后台管理</a></li>
        <li><a href="#">关于我们</a></li>  
    </ul>

</div>


<div class="deputy">
    <div class="breadcrumbs">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>

   

    <div id="notice">
       <span></span> 
    </div>
    
</div>



<div class="wrap">
    
   
    <div class="container">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<div class="footer">
    &copy; My Company <?= date('Y') ?> &nbsp;&nbsp; <?= Yii::powered() ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>