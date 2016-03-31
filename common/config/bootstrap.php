<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'console');
Yii::setAlias('@uploads', dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'uploads');

// Yii::setAlias('@cAssets', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets');
// Yii::setAlias('@cAssetsJs', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'js');
// Yii::setAlias('@cAssetsCss', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'css');