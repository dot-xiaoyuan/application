<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var \backend\modules\rbac\models\search\authItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$js = <<<JS
$('.btn-default').click(function(){
    var href = $(this).attr('href');
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
          $.post(href);
      }
    });
    return false;
})

JS;
$this->registerJs($js);
?>
<?= $this->render('_search', ['model' => $searchModel]) ?>

<div class="auth-item-index card">
    <div class="card-header btn-list">
        <?= Html::a(Yii::$app->params['svg.plus'] . Yii::t('app', 'Create'), ['create'], [
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
            'description:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['class' => 'text-end'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(Yii::$app->params['svg.eye'], ['view', 'name' => $model], [
                            'class' => 'btn btn-icon btn-sm',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'View')
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a(Yii::$app->params['svg.edit'], ['update', 'name' => $model->name], [
                            'class' => 'btn btn-info btn-icon btn-sm',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Yii::$app->params['svg.trash'], ['delete', 'name' => $model->name], [
                            'class' => 'btn btn-danger btn-icon btn-sm btn-default',
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
            'prevPageLabel' => Yii::$app->params['svg.prePage'] . 'prev',
            'nextPageLabel' => 'next' . Yii::$app->params['svg.nextPage'],
        ]
    ]); ?>

    <?php Pjax::end(); ?>
</div>
