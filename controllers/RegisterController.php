<?php
namespace app\controllers;

use dektrium\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function actionRegister()
    {
        $this->render('register');
    }
}
