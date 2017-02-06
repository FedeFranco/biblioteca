<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\assets\PruebaAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SocioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Socios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="socio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    PruebaAsset::register($this) ?>

    <p>
        <?= Html::a('Create Socio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <table>
        <th>
            Categorías
        </th>
        <?php foreach ($model as $key) { ?>
            <tr>
                <td>
                    <a href=<?= Url::to(['site/index', 'id' => $key->id])?>><?= $key->nombre ?></a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>
