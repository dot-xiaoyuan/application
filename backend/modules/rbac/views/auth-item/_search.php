<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\search $model */
/** @var yii\bootstrap5\ActiveForm $form */
$this->registerJsFile(Yii::getAlias('@web/svg/tabler.svg'), [
    'type' => 'image/svg+xml',
    'position' => \yii\web\View::POS_END,
]);
?>

<div class="row align-items-center">
    <div class="col-auto d-print-none">
        <svg class="icon icon-tabler icon-tabler-search" width="24" height="24">
            <use href="#icon-eye"></use>
        </svg>
        <svg class="icon icon-tabler icon-tabler-edit" width="24" height="24">
            <use xlink:href="#icon-search"></use>
        </svg>
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => [
                'data-pjax' => 1,
                'class' => 'd-flex'
            ],
        ]); ?>

        <div class="me-3 d-none d-md-block">
            <?= $form->field($model, 'name')->textInput([
                'class' => 'form-control',
                'placeholder' => 'Search…'
            ])->label(false) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->params['svg.search'] . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::$app->params['svg.refresh'] . Yii::t('app', 'Refresh'), ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>
