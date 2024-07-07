<?php

namespace backend\assets;

use yii\web\AssetBundle;

class SweetalertAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'sweetalert2/dist/sweetalert2.min.css',
    ];

    public $js = [
        'sweetalert2/dist/sweetalert2.min.js',
    ];

    public $depends = [

    ];
}