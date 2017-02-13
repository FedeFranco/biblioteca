<?php
namespace app\controllers;

use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{

    public function actionLibro($q)
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

    public function actionRegister()
    {
        $this->render('register');
    }
}
