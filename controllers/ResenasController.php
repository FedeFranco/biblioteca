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

            if ($al->resenar($model->titulo,$model->cuerpo, $model->libro, Yii::$app->user->id)) {

                return $this->redirect(['site/index']);
            }

        }else {
            return $this->render('resena',['model'=>$model]);
        }
    }

}
