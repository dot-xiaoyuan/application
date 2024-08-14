<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\user\models\search\UserSearch $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="row align-items-center">
    <div class="col-auto d-print-none">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1,
                'class' => 'd-flex'
            ],
        ]); ?>


        <div class="me-3 d-none d-md-block">
            <?= $form->field($model, 'username')->textInput([
                'class' => 'form-control',
                'placeholder' => 'Search…'
            ])->label(false) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->params['svg.search'] . Yii::t('app', 'Search'), ['class' => 'btn btn-primary'])?>
            <?= Html::resetButton(Yii::$app->params['svg.refresh'] . Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
