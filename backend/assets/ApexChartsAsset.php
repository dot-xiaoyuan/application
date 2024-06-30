<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ApexChartsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];

    public $js = [
        'tabler/libs/apexcharts/dist/apexcharts.min.js',
    ];

    public $jsOptions = ['position' => View::PH_HEAD];

    public $depends = [
    ];
}