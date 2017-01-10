<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alquiler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alquiler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'socios_id')->textInput() ?>

    <?= $form->field($model, 'libros_id')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
