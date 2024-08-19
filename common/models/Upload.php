<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

class Upload
{
    const UPLOAD_PATH = '/uploads/';
    /**
     * @var mixed
     */
    public static $path = '@backend/web/uploads/';

    /**
     * @param $file UploadedFile
     * @return string
     */
    public static function upload($file)
    {
        $path = Yii::getAlias(static::$path);
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $filename = sprintf("%s%s%s.%s", date('y-m-d'), rand(1000, 9999), $file->baseName, $file->extension);
        $img = $path . $filename;
        $file->saveAs($img);
        return self::UPLOAD_PATH . $filename;
    }
}