<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\Role $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="role-form card col-md-6 col-xs-6">

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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group card-footer text-end">
        <?= Html::submitButton(Yii::$app->params['svg.save'] . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
