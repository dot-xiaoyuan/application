<?php

namespace backend\assets;

use yii\web\AssetBundle;

class TablerAsset extends AssetBundle
{
    public $basePath = '@webroot/';
    public $baseUrl = '@web';
    public $css = [
        'tabler/dist/css/tabler.min.css',
        'tabler/dist/css/tabler-flags.min.css',
        'tabler/dist/css/tabler-payments.min.css',
        'tabler/dist/css/tabler-vendors.min.css',
        'css/site.css',
    ];
    public $js = [
        'tabler/dist/js/tabler.min.js',
        'js/theme.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}