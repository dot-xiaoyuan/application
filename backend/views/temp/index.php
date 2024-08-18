<?php

use kartik\file\FileInput;
use yii\helpers\Url;

echo FileInput::widget([
    'name' => 'imageFiles[]',
    'options' => [
        'multiple' => true
    ],
    'pluginOptions' => [
        'uploadUrl' => Url::to(['/upload/index']),
        'uploadExtraData' => [
            'album_id' => 20,
            'cat_id' => 'Nature'
        ],
        'maxFileCount' => 10
    ]
]);