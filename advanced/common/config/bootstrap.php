<?php

require(dirname(dirname(dirname(__DIR__)) ). "/config.php");

Yii::setAlias('@common', ROOT_MAIN . '/common');
Yii::setAlias('@frontend', ROOT_MAIN . '/frontend');
Yii::setAlias('@backend', ROOT_MAIN . '/backend');
Yii::setAlias('@console', ROOT_MAIN . '/console');
// uploads : print, reports
Yii::setAlias('@uploads', ROOT . '/uploads');
Yii::setAlias('@print', ROOT . '/uploads/print');
Yii::setAlias('@reports', ROOT . '/uploads/reports');