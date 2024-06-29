<?php

namespace backend\assets;

use yii\web\AssetBundle;

class TablerAsset extends AssetBundle
{
    public $basePath = '@webroot/tabler/dist';
    public $baseUrl = '@web/tabler/dist';
    public $css = [
        'css/tabler.css',
    ];
    public $js = [
        'js/tabler.js'
    ];
    public $depends = [

    ];
}