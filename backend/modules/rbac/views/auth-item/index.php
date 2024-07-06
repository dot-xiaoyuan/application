<?php

use backend\modules\rbac\models\AuthItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\modules\rbac\models\search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index card">
    <div class="card-header btn-list">
        <?= Html::a(Html::tag('i', Yii::t('app', 'Create'), ['class' => 'ti ti-plus']), ['create'], [
            'class' => 'btn btn-success',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Create')
        ]) ?>
    </div>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'layout' => "{items}\n{pager}",
        'options' => ['class' => 'card'],
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table card-table table-vcenter text-nowrap datatable'],
        'columns' => [
//            ['class' => 'yii\grid\CheckboxColumn', 'headerOptions' => ['class' => 'w-1']],
            'name',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->name), ['invoice/view'], ['class' => 'text-reset', 'tabindex' => '-1']);
                }
            ],
            'created_at:date',
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($model) {
                    return \common\widgets\Badges::widget(['content' => $model->type]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['class' => 'text-end'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(Html::tag('i', null, ['class' => 'ti ti-eye']), ['view', 'name' => $model->name], [
                            'class' => 'btn btn-icon btn-sm',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'View')
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a(Html::tag('i', null, ['class' => 'ti ti-edit']), ['update', 'name' => $model->name], [
                            'class' => 'btn btn-info btn-icon btn-sm',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Html::tag('i', null, ['class' => 'ti ti-trash']), ['delete', 'name' => $model->name], [
                            'class' => 'btn btn-danger btn-icon btn-sm',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Delete')
                        ]);
                    }
                ],
                'contentOptions' => ['class' => 'text-end'],
            ]
        ],
        'pager' => [
            'options' => ['class' => 'pagination m-0 ms-auto'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'prevPageLabel' => Yii::$app->params['prePage'] . 'prev',
            'nextPageLabel' => 'next' . Yii::$app->params['nextPage'],
        ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
