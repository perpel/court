<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class FreezeHeaderAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            'etc/table/freezeheader.css'
    ];
    public $js = [
            'etc/table/jquery.freezeheader.js'
    ];
    public $depends = [
       'yii\web\YiiAsset',
    //'yii\bootstrap\BootstrapAsset',
    ];
}
