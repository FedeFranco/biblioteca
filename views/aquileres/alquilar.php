<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Socio;

/* @var $this yii\web\View */
/* @var $model app\models\Alquiler */
/* @var $form ActiveForm */
?>
<div class="alquilar">
<?php $arraySocios = Socio::find()->select('nombre')->asArray()->all();
    ?>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'socio')->dropDownList($arraySocios[0]) ?>
        <?= $form->field($model, 'libro') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- alquilar -->
