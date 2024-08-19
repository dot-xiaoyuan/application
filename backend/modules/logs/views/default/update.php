<?php

/** @var yii\web\View $this */
/** @var backend\modules\logs\models\OperatorLog $model */

$this->title = Yii::t('app', 'Update Operator Log: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operator Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="operator-log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
