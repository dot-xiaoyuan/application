<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class JsvectorMapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];

    public $js = [
        'tabler/libs/jsvectormap/dist/js/jsvectormap.min.js',
        'tabler/libs/jsvectormap/dist/maps/world.js',
        'tabler/libs/jsvectormap/dist/maps/world-merc.js',
    ];

    public $jsOptions = ['position' => View::POS_END];

    public $depends = [
    ];
}