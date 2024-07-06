<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\AuthItem $model */

$this->title = Yii::t('app', 'Create Auth Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
