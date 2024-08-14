<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var yii\gii\generators\crud\Generator $generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->searchModelClass, '\\') ?> $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="row align-items-center">
    <div class="col-auto d-print-none">
        <?= "<?php " ?>$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        <?php if ($generator->enablePjax): ?>
            'options' => [
            'data-pjax' => 1
            ],
        <?php endif; ?>
        ]); ?>

        <?php
        $count = 0;
        foreach ($generator->getColumnNames() as $attribute) {
            if (++$count < 6) {
                echo '<div class="me-3 d-none d-md-block">';
                echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                echo '</div>';
            } else {
                echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
            }
        }
        ?>
        <div class="form-group">
            <?= "<?= " ?>Html::submitButton(Yii::$app->params['svg.search'] . <?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary'])
            ?>
            <?= "<?= " ?>Html::resetButton(Yii::$app->params['svg.refresh'] . <?= $generator->generateString('Reset') ?>, ['class' => 'btn
            btn-outline-secondary']) ?>
        </div>

        <?= "<?php " ?>ActiveForm::end(); ?>
    </div>
</div>
