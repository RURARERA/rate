<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/28/18
 * Time: 11:27 AM
 */

namespace app\modules\v1\controllers;


use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class RatingController extends ActiveController
{
    public $modelClass = 'app\modules\v1\models\Rating';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET'],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        ArrayHelper::remove($actions, 'index');
        ArrayHelper::remove($actions, 'view');
        ArrayHelper::remove($actions, 'create');
        ArrayHelper::remove($actions, 'update');
        ArrayHelper::remove($actions, 'delete');
        ArrayHelper::remove($actions, 'options');

        return ArrayHelper::merge($actions, [
            'index' => [
                'class' => 'app\modules\v1\actions\rating\IndexAction',
                'modelClass' => $this->modelClass,
            ],
        ]);
    }

    protected function verbs()
    {
        return [
            'index' => ['GET'],
        ];
    }
}