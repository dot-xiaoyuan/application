<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\user\models\User $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="user-form card">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'card-body'],
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label'],
            'inputOptions' => ['class' => 'form-control'], // Tabler 类名
        ],
    ]); ?>
    <fieldset class="form-fieldset">
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'identity_type')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'identity_card')->textInput(['maxlength' => true]) ?>

            </div>
            <div class="col-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </fieldset>
    <div class="form-group card-footer text-end">
        <?= Html::submitButton(Yii::$app->params['svg.save'] . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
