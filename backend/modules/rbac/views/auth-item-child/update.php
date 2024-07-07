<?php

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\AuthItemChild $model */

$this->title = Yii::t('app', 'Update Auth Item Child: {name}', [
    'name' => $model->parent,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auth-item-child-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
