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
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'showHeader' => true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table card-table table-vcenter text-nowrap datatable'],
        'layout' => "
        <div class='card'>
            <div class='card-header'>
                <h3 class='card-title'>Invoices</h3>
            </div>
            <div class='card-body border-bottom py-3'>
                <div class='d-flex'>
                    <div class='text-secondary'>
                        Show
                        <div class='mx-2 d-inline-block'>
                            {summary}
                        </div>
                        entries
                    </div>
                    <div class='ms-auto text-secondary'>
                        Search:
                        <div class='ms-2 d-inline-block'>
                        </div>
                    </div>
                </div>
            </div>
            <div class='table-responsive'>{items}</div>
            <div class='card-footer d-flex align-items-center'>
                <p class='m-0 text-secondary'>Showing {begin} to {end} of {totalCount} entries</p>
                <ul class='pagination m-0 ms-auto'>{pager}</ul>
            </div>
        </div>
    ",
        'summary' => Html::tag('input', '', [
            'type' => 'text',
            'class' => 'form-control form-control-sm',
            'value' => 8,
            'size' => 3,
            'aria-label' => 'Invoices count'
        ]),
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn', 'headerOptions' => ['class' => 'w-1']],
//        [
//            'attribute' => 'id',
//            'headerOptions' => ['class' => 'w-1'],
//            'contentOptions' => ['class' => 'text-secondary'],
//        ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->name), ['invoice/view'], ['class' => 'text-reset', 'tabindex' => '-1']);
                }
            ],
//        'client',
//        'vat_no',
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
            'price:currency',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{actions}',
                'headerOptions' => ['class' => 'text-end'],
                'buttons' => [
                    'actions' => function ($url, $model, $key) {
                        return Html::button('Actions', [
                                'class' => 'btn dropdown-toggle align-text-top',
                                'data-bs-boundary' => 'viewport',
                                'data-bs-toggle' => 'dropdown'
                            ]) . Html::tag('div',
                                Html::a('Action', '#', ['class' => 'dropdown-item']) .
                                Html::a('Another action', '#', ['class' => 'dropdown-item']),
                                ['class' => 'dropdown-menu dropdown-menu-end']
                            );
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
