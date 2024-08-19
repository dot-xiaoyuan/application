<?php


/** @var yii\web\View $this */
/** @var backend\modules\logs\models\OperatorLog $model */

$this->title = Yii::t('app', 'Create Operator Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operator Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-log-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
