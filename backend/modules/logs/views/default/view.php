<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\logs\models\OperatorLog $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operator Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operator-log-view card">

    <div class="card-header btn-list">
        <?=  Html::a(Yii::$app->params['svg.edit'], ['update', 'id' => $model->id], [
            'class' => 'btn btn-info btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
        ]) ?>
        <?=  Html::a(Yii::$app->params['svg.trash'], ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Delete')
        ]) ?>
    </div>
    <div class="card-body">
        <?= \common\widgets\DataGrid::widget([
            'model' => $model,
            'attributes' => [
                'id',
            'user_id',
            'username',
            'role',
            'operation',
            'description',
            'ip_address',
            'user_agent',
            'created_at',
            'updated_at',
            'status',
            ],
        ]) ?>
    </div>
</div>
