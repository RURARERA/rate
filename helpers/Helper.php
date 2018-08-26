<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 4:51 PM
 */

namespace app\helpers;

use Yii;
class Helper
{
    public static function getStatus($model)
    {
        if ($model->status == Yii::$app->params['active']) {
            $status = Yii::t('app', 'Active');
        } elseif ($model->status == Yii::$app->params['inactive']) {
            $status = Yii::t('app', 'Inactive');
        } else {
            $status = Yii::t('app', 'Not set');
        }

        return $status;
    }
}