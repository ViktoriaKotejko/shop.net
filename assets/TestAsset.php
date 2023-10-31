<?php


namespace app\assets;


use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{

 public $basePath = '@webroot';
 public $baseUrl = '@web';

    public $css = [
        'css/styles.css',
    ];

    public $js = [
        'js/script.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}