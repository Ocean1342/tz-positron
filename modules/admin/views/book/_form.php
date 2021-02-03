<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Book */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true,'required'=>'required']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'required'=>'required']) ?>

    <?= $form->field($model, 'authors')->textInput(['maxlength' => true,'required'=>'required']) ?>

    <?= $form->field($model, 'categories')->textInput(['maxlength' => true,'required'=>'required']) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?php //=$form->field($model, 'thumbnailUrl')->textInput(['maxlength' => true]) ?>


    <?php if ($model->thumbnailUrl !== NULL): ?>
        <?= \yii\helpers\BaseHtml::img('@uploads/'. $model->thumbnailUrl,['class'=>'img-responsive']) ?>
    <?php else: ?>
        Изображение отсутствует. Загрузите его.
    <?php endif ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'shortDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publishedDate')->textInput() ?>

    <?= $form->field($model, 'pageCount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
