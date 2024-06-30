<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class TablerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'tabler/dist/css/tabler.min.css',
        'tabler/dist/css/tabler-flags.min.css',
        'tabler/dist/css/tabler-payments.min.css',
        'tabler/dist/css/tabler-vendors.min.css',
    ];

    public $js = [
        'tabler/dist/js/tabler.min.js',
    ];
    public $jsOptions = ['position' => View::PH_BODY_BEGIN];

    public $depends = [
    ];
}