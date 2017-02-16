<?php

namespace app\controllers;

use app\models\ResenaForm;
use app\models\Resena;
use app\models\Libro;
use yii\data\ActiveDataProvider;
use Yii;

class ResenasController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLibros($q)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Libro::find()->where(['ilike', 'titulo', $q]),
            'pagination' => [
                'pageSize' => 1,
            ],
            'sort' => false,
        ]);
        return $this->renderAjax('_libro', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionResena()
    {
        $model = new ResenaForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $al = new Resena;

            if ($al->resenar($model->titulo, $model->cuerpo, $model->libro, Yii::$app->user->id)) {
                return $this->redirect(['site/index']);
            }
        } else {
            return $this->render('resena', ['model'=>$model]);
        }
    }
}
