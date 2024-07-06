<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\AuthItem $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="auth-item-view card">

    <div class="card-header btn-list">
        <?= Html::a(Yii::$app->params['svg.edit'], ['update', 'name' => $model->name], [
            'class' => 'btn btn-info btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
        ]) ?>
        <?= Html::a(Yii::$app->params['svg.trash'], ['delete', 'name' => $model->name], [
            'class' => 'btn btn-danger btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Delete')
        ]) ?>
    </div>

    <div class="card-body">
        <?= \common\widgets\DataGrid::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'type',
                'description:ntext',
                'rule_name',
                'data',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>
