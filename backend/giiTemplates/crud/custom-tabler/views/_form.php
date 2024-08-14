<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var yii\gii\generators\crud\Generator $generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->modelClass, '\\') ?> $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form card col-md-6 col-xs-6">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'options' => ['class' => 'card-body'],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class='mb-3 row'>{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}</div>",
            'horizontalCssClasses' => [
                'label' => 'col-3 col-form-label',
                'offset' => 'offset-sm-4',
                'wrapper' => 'col',
                'error' => '',
                'hint' => 'form-hint',
            ]
        ]
    ]); ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
    <div class="form-group card-footer text-end">
        <?= "<?= " ?>Html::submitButton(Yii::$app->params['svg.save'] . <?= $generator->generateString('Save') ?>, ['class' => 'btn btn-success']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
