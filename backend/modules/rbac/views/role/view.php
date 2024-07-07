<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\Role $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="role-view card">

    <div class="card-header btn-list">
        <?=  Html::a(Yii::$app->params['svg.edit'], ['update', 'name' => $model->name], [
            'class' => 'btn btn-info btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
        ]) ?>
        <?=  Html::a(Yii::$app->params['svg.trash'], ['delete', 'name' => $model->name], [
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
                [
                    'attribute' => 'type',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return \common\widgets\Badges::widget(['content' => $model->type ? Yii::t('app', 'Premiss') : Yii::t('app', 'Role')]);
                    }
                ],
                'description:ntext',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>
</div>
