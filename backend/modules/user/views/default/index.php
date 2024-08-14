<?php

use backend\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\modules\user\models\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Users');
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
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="user-index card">

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
            ['class' => 'yii\grid\SerialColumn'],
            'id',
//            'identity_type',
            'username',
//            'password_hash',
//            'identity_card',
            //'auth_key',
            'email:email',
            //'avatar',
            //'address',
            //'status',
            'operator',
            'created_at:datetime',
            'updated_at:datetime',
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
