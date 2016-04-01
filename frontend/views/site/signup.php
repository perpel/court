<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '用户注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写注册信息:</p>

    <div class="row">
    <div class="col-lg-2"></div>
        <div class="col-lg-8 col">
            <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-sm-2',
                        'wrapper' => 'col-sm-10',
                        'error' => 'text-left'
                    ]
                ]
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                    <?= Html::resetButton('清空', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
