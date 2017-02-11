<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resena */
/* @var $form ActiveForm */
?>
<div class="resena">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'titulo') ?>
        <?= $form->field($model, 'usuario_id') ?>
        <?= $form->field($model, 'fecha') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- resena -->
