<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\CourtLevel;
use common\models\Court;


$this->title = '法院注册';
$this->params['breadcrumbs'][] = $this->title;

echo $this->registerJs($script);
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请输入法院注册信息</p>
    
    <div class="row">
        <div class="col">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'courtname') ?>

                <?= $form->field($model, 'courtnumber')->label("邮政编码") ?>

                <?= $form->field($model, 'prefix_flownumber')->textInput(["value"=>"浙江法委"]) ?>

                <?php //$form->field($model, 'level')->dropDownList(CourtLevel::getLevelList()) ?>

                <?= $form->field($model, 'up_level')->dropDownList(Court::CourtsWithSelect()) ?>

                <?= $form->field($model, 'register_number') ?>
                    
                </div>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>