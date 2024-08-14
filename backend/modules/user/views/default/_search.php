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
            'data-pjax' => 1
            ],
                ]); ?>

        <div class="me-3 d-none d-md-block">    <?= $form->field($model, 'id') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'identity_type') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'username') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'password_hash') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'identity_card') ?>

</div>    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->params['svg.search'] . Yii::t('app', 'Search'), ['class' => 'btn btn-primary'])
            ?>
            <?= Html::resetButton(Yii::$app->params['svg.refresh'] . Yii::t('app', 'Reset'), ['class' => 'btn
            btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
