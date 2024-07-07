<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\search\AuthItemChildSearch $model */
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

        <div class="me-3 d-none d-md-block">    <?= $form->field($model, 'parent') ?>

</div><div class="me-3 d-none d-md-block">    <?= $form->field($model, 'child') ?>

</div>        <div class="form-group">
            <?= Html::submitButton(Yii::$app->params['svg.authItemSearch'] . Yii::t('app', 'Search'), ['class' => 'btn btn-primary'])
            ?>
            <?= Html::resetButton(Yii::$app->params['svg.refresh'] . Yii::t('app', 'Reset'), ['class' => 'btn
            btn-outline-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
