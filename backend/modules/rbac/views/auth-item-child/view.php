<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\AuthItemChild $model */

$this->title = $model->parent;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="auth-item-child-view card">

    <div class="card-header btn-list">
        <?=  Html::a(Yii::$app->params['svg.edit'], ['update', 'parent' => $model->parent, 'child' => $model->child], [
            'class' => 'btn btn-info btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
        ]) ?>
        <?=  Html::a(Yii::$app->params['svg.trash'], ['delete', 'parent' => $model->parent, 'child' => $model->child], [
            'class' => 'btn btn-danger btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Delete')
        ]) ?>
    </div>
    <div class="card-body">
        <?= \common\widgets\DataGrid::widget([
            'model' => $model,
            'attributes' => [
                'parent',
            'child',
            ],
        ]) ?>
    </div>
</div>
