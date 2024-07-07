<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \backend\modules\rbac\models\search\authItemSearch $model */
/** @var yii\bootstrap5\ActiveForm $form */
$this->registerJsFile(Yii::getAlias('@web/svg/tabler.svg'), [
    'type' => 'image/svg+xml',
    'position' => \yii\web\View::POS_END,
]);
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
            <?= $form->field($model, 'name')->textInput([
                'class' => 'form-control',
                'placeholder' => 'Search…'
            ])->label(false) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->params['svg.authItemSearch'] . Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton(Yii::$app->params['svg.refresh'] . Yii::t('app', 'Refresh'), ['class' => 'btn btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>
