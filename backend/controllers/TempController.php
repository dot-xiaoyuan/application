<?php

namespace backend\controllers;

use yii\web\Controller;

class TempController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}