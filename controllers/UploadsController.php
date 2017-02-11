<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Upload;
use yii\web\UploadedFile;

class UploadsController extends Controller
{
    public function actionUpload()
    {
        $model = new Upload();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
