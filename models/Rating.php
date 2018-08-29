<?php

namespace app\models;

use kartik\widgets\Select2;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int $state 1: excellent, 2: good, 3: bad
 * @property string $time
 * @property int $service_id
 * @property int $device_id
 *
 * @property Service $service
 * @property Device $device
 */
class Rating extends \yii\db\ActiveRecord
{
    public $datetime_start;
    public $datetime_end;
    public $time_;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['state', 'service_id', 'device_id'], 'required', 'on' => ['create', 'update']],
            [['state', 'service_id', 'device_id'], 'integer'],
            [['time', 'datetime_start', 'datetime_end'], 'safe'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::className(), 'targetAttribute' => ['device_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'state' => Yii::t('app', 'State'),
            'time' => Yii::t('app', 'Time'),
            'service_id' => Yii::t('app', 'Service ID'),
            'device_id' => Yii::t('app', 'Device ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::className(), ['id' => 'device_id']);
    }

    public function filter($params, $state)
    {
        if (!empty($params)) {
            $this->load($params);
            $time_ = explode('to', $params['Rating']['time_']);
            $this->datetime_start = $time_[0];
            $this->datetime_end = $time_[1];

            Yii::warning("time_: " . print_r($time_, true));
            return self::find()
                ->where(['state' => $state])
                ->andFilterWhere(['service_id' => $this->service_id])
                ->andFilterWhere(['>=', 'time', $this->datetime_start])
                ->andFilterWhere(['<=', 'time', $this->datetime_end])
                ->all();
        } else {
            $today = (new \DateTime())->setTime(0,0, 0);
            $now = new Expression('NOW()');

            return self::find()
                ->where(['state' => $state])
                ->andFilterWhere(['>=', 'time', $today->format('Y-m-d H:i:s')])
                ->andFilterWhere(['<=', 'time', $now])
                ->all();
        }
    }
}
