<?php

namespace app\controllers;

use app\models\ResenaForm;
use app\models\Resena;
use Yii;

class ResenasController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionResena()
    {
        $model = new ResenaForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $al = new Resena;
            if ($al->resenar($model->titulo,$model->cuerpo, 6)) {
                return $this->render('resena',['model'=>$model]);
            }

        }else {
            return $this->render('resena',['model'=>$model]);
        }
    }

}
