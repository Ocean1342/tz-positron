<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BookSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'isbn') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'authors') ?>

    <?= $form->field($model, 'categories') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'thumbnailUrl') ?>

    <?php // echo $form->field($model, 'shortDescription') ?>

    <?php // echo $form->field($model, 'longDescription') ?>

    <?php // echo $form->field($model, 'publishedDate') ?>

    <?php // echo $form->field($model, 'pageCount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
