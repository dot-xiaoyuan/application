<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\user\models\User $model */

$this->title = Yii::t('app', 'User Detail') . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view card">

    <div class="card-header btn-list">
        <?= Html::a(Yii::$app->params['svg.edit'], ['update', 'id' => $model->id], [
            'class' => 'btn btn-info btn-icon',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
        ]) ?>
        <?= Html::a(Yii::$app->params['svg.trash'], ['delete', 'id' => $model->id], [
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
                'identity_type',
                'username',
//                'password_hash',
                'identity_card',
//                'auth_key',
                'email:email',
                'avatar',
                'address',
//                'status',
                'operator',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>
