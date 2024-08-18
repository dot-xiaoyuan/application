<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

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

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>
            </div>
            <div class="col-6">
                <?= $form->field($model, 'avatar')->widget(FileInput::class, ([
                    'options' => ['accepts' => 'image/*', 'multiple' => false],
                    'pluginOptions' => [
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCancel' => false,
                    ]
                ])) ?>
            </div>
        </div>
    </fieldset>
    <div class="form-group card-footer text-end">
        <?= Html::submitButton(Yii::$app->params['svg.save'] . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
