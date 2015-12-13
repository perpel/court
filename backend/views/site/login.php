<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\assets\LoginAsset;
LoginAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <?= Html::csrfMetaTags() ?>
    <title>登录</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="bigbox">
    <div class="fixedvox">
    <div style="height:80px;"></div>
 <?php $form = ActiveForm::begin(); ?>      
        <div class="logininput">
            <div class="password">
                <ul>
                    <li class="titlename">后台管理系统</li>   

                    <li>
                        <?= $form->field($model, 'username', ['template'=>'{label}'])->label("帐号:")?>
                        <?= $form->field($model, 'username', ['template'=>'{input}{error}']) ?>
                    </li>
                    <li>
                        <?= $form->field($model, 'password', ['template'=>'{label}'])->label("密码:")?>
                        <?= $form->field($model, 'password', ['template'=>'{input}{error}'])->passwordInput()?>
                    </li>
            


                    <li>
                        <input type="submit"  value="登录" />
                        <input type="reset"  value="重置" />
                    </li>
                </ul>
            </div>
        </div>
<?php ActiveForm::end(); ?> 
    </div>
</div>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>