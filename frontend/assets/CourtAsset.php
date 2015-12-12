<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CourtAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            'etc/tree/tree.css'
    ];
    public $js = [
            'etc/tree/tree.js',
            'etc/table/jquery.freezeheader.js'
    ];
    public $depends = [
       'yii\web\YiiAsset',
    //'yii\bootstrap\BootstrapAsset',
    ];
}
