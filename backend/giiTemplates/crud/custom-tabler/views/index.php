<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var yii\gii\generators\crud\Generator $generator */

$modelClass = StringHelper::basename($generator->modelClass);

echo "<?php\n";
?>

use <?= $generator->modelClass ?>;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/** @var yii\web\View $this */
<?= !empty($generator->searchModelClass) ? "/** @var " . ltrim($generator->searchModelClass, '\\') . " \$searchModel */\n" : '' ?>
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<?= "<?php \n"?>
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
<?php if (!empty($generator->searchModelClass)): ?>
    <?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index card">

    <div class="card-header btn-list">
        <?= "<?= " ?> Html::a(Yii::$app->params['svg.plus'] . Yii::t('app', 'Create'), ['create'], [
            'class' => 'btn btn-success',
            'aria-label' => 'button',
            'data-bs-toggle' => "tooltip", 'data-bs-placement' => "top", 'title' => Yii::t('app', 'Create')
        ]) ?>

    </div>
    <?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : '' ?>


    <?php if ($generator->indexWidgetType === 'grid'): ?>
        <?= "<?= " ?>GridView::widget([
        'layout' => "{items}\n{pager}",
        'options' => ['class' => 'card'],
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table card-table table-vcenter text-nowrap datatable'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        <?php
        $count = 0;
        if (($tableSchema = $generator->getTableSchema()) === false) {
            foreach ($generator->getColumnNames() as $name) {
                if (++$count < 6) {
                    echo "            '" . $name . "',\n";
                } else {
                    echo "            //'" . $name . "',\n";
                }
            }
        } else {
            foreach ($tableSchema->columns as $column) {
                $format = $generator->generateColumnFormat($column);
                if (++$count < 6) {
                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                } else {
                    echo "            //'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                }
            }
        }
        ?>
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
    <?php else: ?>
        <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
        return Html::a(Html::encode($model-><?= $generator->getNameAttribute() ?>), ['view', <?= $generator->generateUrlParams() ?>]);
        },
        ]) ?>
    <?php endif; ?>

    <?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>

</div>
