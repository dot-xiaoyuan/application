<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\logs\models\search $model */
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

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'user_id') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'username') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'role') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'operation') ?>

</div>    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <?php // echo $form->field($model, 'user_agent') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::$app->params['svg.search'] . Yii::t('app', 'Search'), ['class' => 'btn btn-primary'])
            ?>
            <?= Html::resetButton(Yii::$app->params['svg.refresh'] . Yii::t('app', 'Reset'), ['class' => 'btn
            btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
