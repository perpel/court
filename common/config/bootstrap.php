<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'console');
Yii::setAlias('@uploads', dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'uploads');
