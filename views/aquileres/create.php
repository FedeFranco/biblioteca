<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Alquiler */

$this->title = 'Create Alquiler';
$this->params['breadcrumbs'][] = ['label' => 'Alquilers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alquiler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
