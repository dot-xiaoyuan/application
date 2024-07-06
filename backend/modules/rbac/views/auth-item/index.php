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
<div class="auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Auth Item'), ['create'], ['class' => 'btn btn-success']) ?>
        <i class="bi bi-eye"></i>
    </p>
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
                    $badgeClass = 'bg-secondary';
                    if ($model->type == 'Paid') {
                        $badgeClass = 'bg-success';
                    } elseif ($model->type == 'Pending') {
                        $badgeClass = 'bg-warning';
                    } elseif ($model->type == 'Due') {
                        $badgeClass = 'bg-danger';
                    }
                    return Html::tag('span', '', ['class' => "badge $badgeClass me-1"]) . $model->type;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['class' => 'text-end'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>', '', [
                                'class' => 'btn btn-info btn-icon',
                                'aria-label' => 'button',
                            ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>', '', [
                            'class' => 'btn btn-success btn-icon',
                            'aria-label' => 'button',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>', '', [
                            'class' => 'btn btn-danger btn-icon',
                            'aria-label' => 'button',
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
            'prevPageLabel' => Html::tag('svg', Html::tag('path', '', ['d' => 'M15 6l-6 6l6 6']), ['xmlns' => 'http://www.w3.org/2000/svg', 'class' => 'icon', 'width' => '24', 'height' => '24', 'viewBox' => '0 0 24 24', 'stroke-width' => '2', 'stroke' => 'currentColor', 'fill' => 'none', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']) . 'prev',
            'nextPageLabel' => 'next' . Html::tag('svg', Html::tag('path', '', ['d' => 'M9 6l6 6l-6 6']), ['xmlns' => 'http://www.w3.org/2000/svg', 'class' => 'icon', 'width' => '24', 'height' => '24', 'viewBox' => '0 0 24 24', 'stroke-width' => '2', 'stroke' => 'currentColor', 'fill' => 'none', 'stroke-linecap' => 'round', 'stroke-linejoin' => 'round']),
        ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
