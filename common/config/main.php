<?php
return [
	'language' => 'zh-CN',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'aliases' => [
    		'@cassets' => dirname(dirname(Yii::getAlias('@web'))) . '/common/assets'
    	],
];
