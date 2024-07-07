<?php


/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\AuthItemChild $model */

$this->title = Yii::t('app', 'Create Auth Item Child');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
