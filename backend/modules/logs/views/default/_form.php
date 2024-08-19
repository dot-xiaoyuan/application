<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\logs\models\OperatorLog $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="operator-log-form card col-md-6 col-xs-6">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'card-body'],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class='mb-3 row'>{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}</div>",
            'horizontalCssClasses' => [
                'label' => 'col-3 col-form-label',
                'offset' => 'offset-sm-4',
                'wrapper' => 'col',
                'error' => '',
                'hint' => 'form-hint',
            ]
        ]
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group card-footer text-end">
        <?= Html::submitButton(Yii::$app->params['svg.save'] . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
