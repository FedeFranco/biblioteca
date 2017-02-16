<?php
use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<?php Pjax::begin([
    'enablePushState' => false,
    ]) ?>

<?= \yii\grid\GridView::widget([
    'id' => 'librosGrid',
    'dataProvider' => $dataProvider,
    'columns' => [
        'titulo',
    ],

    /*'tableOptions' => [
        'class' => 'table table-bordered table-hover',
    ],*/
]) ?>

<?php
    $url = Url::to(['resenas/resena']);
    echo <<<EOT
    <script>
  $('#librosGrid tr').click(function (event) {
        var target = event.currentTarget;
        if ($(target).children().length > 1) {
            var obj = $(target).children().first();
            numero = $(obj[0]).text();
            window.location.assign('$url' + '?titulo=' + titulo);
        }
    });
    </script>
EOT;
?>

<?php Pjax::end() ?>
