<?php

namespace backend\controllers;

use common\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstanceByName(Yii::$app->request->post('name'));
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $model->upload();
        }
    }

    public function actionMulti()
    {
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstancesByName(Yii::$app->request->post('name'));
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $model->upload();
        }
    }
}