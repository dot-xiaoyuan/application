<?php

namespace common\models;

use yii\web\UploadedFile;

class Upload
{
    /**
     * @var mixed
     */
    public static $path = '/uploads';

    /**
     * @param $file UploadedFile
     * @return string
     */
    public static function upload($file)
    {
        if (!is_dir(self::$path)) {
            mkdir(self::$path, 0777, true);
        }
        $img = self::$path . '/' . date('Ymd') . rand(1000, 9999) . $file->baseName . '.' . $file->extension;
        $file->saveAs($img);
        return $img;
    }
}