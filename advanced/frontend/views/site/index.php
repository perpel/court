<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['systemTitle'];
?>
<div class="site-index">

     <div class="jumbotron">
        <h1><?= Yii::$app->params['index']['header']?></h1>

        <p class="lead"><?= Yii::$app->params['index']['smallHeader']?></p>
        <?php if (!empty(Yii::$app->params['index']['btnHeader']['name'])): ?>
        <p><a class="btn btn-lg btn-success" href="<?= Yii::$app->params['index']['btnHeader']['url']?>"><?= Yii::$app->params['index']['btnHeader']['name'] ?></a></p>
        <?php endif; ?>
    </div>

    <div class="body-content">
        <div class="row">
        <?php foreach (Yii::$app->params['index']['contents'] as $key => $value):?>

            <div class="col-lg-<?= 12/Yii::$app->params['index']['contentsConfig']['col']?>">
                <h2><?= $value['section']['title']?></h2>

                <p><?= $value['section']['contents']?></p>
                <?php if (!empty($value['section']['btn']['name'])):?>
                <p><a class="btn btn-default" href="<?= $value['section']['btn']['url']?>"><?= $value['section']['btn']['name']?> &raquo;</a></p>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
        </div>

    </div>
</div>
