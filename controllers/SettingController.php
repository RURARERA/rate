<?php

namespace app\controllers;
use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SettingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return $this->render('index', ['model' => $model]);
    }

}
