<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;

$url = Url::to(['resenas/libros']);
$urlActual = Url::to(['resenas/resena']);
$js = <<<EOT
    $('#resenaform-libro').keyup(function() {
        var q = $('#resenaform-libro').val();
        if (q == '') {
            $('#lib').html('');
        }
        /*if (!isNaN(q)) {
            return;
        }*/
        $.ajax({
            method: 'GET',
            url: '$url',
            data: {
                q: q
            },
            success: function (data, status, event) {
                $('#lib').html(data);
            }
        });
    });
EOT;
$this->registerJs($js);


/* @var $this yii\web\View */
/* @var $model app\models\Resena */
/* @var $form ActiveForm */
?>
<div class="resena">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'titulo') ?>
        <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'libro') ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- resena -->
<div id="lib"></div>
