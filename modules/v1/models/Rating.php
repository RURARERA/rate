<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/27/18
 * Time: 3:09 PM
 */

namespace app\modules\v1\models;

use \app\models\Rating as BaseRating;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Rating extends BaseRating
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['time'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}