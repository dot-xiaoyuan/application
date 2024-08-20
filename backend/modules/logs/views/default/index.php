<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\modules\logs\models\search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Operator Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$js = <<<JS
$('.btn-default-delete').click(function(){
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
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="operator-log-index card">

    <div class="card-header btn-list">

    </div>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table card-table table-vcenter text-nowrap datatable'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'username',
            'role',
            'operation',
            [
                'class' => '\kartik\grid\DataColumn',
                'contentOptions' => ['class' => 'w-1'],
                'attribute' => 'description',
            ],
            'ip_address',
            'created_at:datetime',
            'updated_at:datetime',
            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['class' => 'text-end'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(Yii::$app->params['svg.eye'], ['view', 'id' => $model->id], [
                            'class' => 'text-black',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'View')
                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a(Yii::$app->params['svg.edit'], ['update', 'id' => $model->id], [
                            'class' => 'text-black',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Update')
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Yii::$app->params['svg.trash'], ['delete', 'id' => $model->id], [
                            'class' => 'text-black btn-default-delete',
                            'aria-label' => 'button',
                            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Delete')
                        ]);
                    }
                ],
                'contentOptions' => ['class' => 'text-end'],
            ],
        ],
    ]); ?>


    <?php Pjax::end(); ?>

</div>
