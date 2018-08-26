<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 2:39 PM
 */

namespace app\modules\v1\controllers;

use yii\helpers\ArrayHelper;


class RateController
{
    public $modelClass = '';
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
                'class' => 'app\modules\v1\actions',
                'modelClass' => $this->modelClass,
            ],
        ]);
    }
}