<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $uuid
 * @property int $service_id
 * @property int $location_id
 * @property string $mac_address
 * @property int $status 1: active, 0: inactive
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Service $service
 * @property Rating[] $ratings
 */
class Device extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'service_id', 'location_id', 'mac_address'], 'required'],
            [['service_id', 'location_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['uuid'], 'string', 'max' => 255],
            [['mac_address'], 'string', 'max' => 125],
            [['uuid'], 'unique'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'service_id' => Yii::t('app', 'Service'),
            'location_id' => Yii::t('app', 'Location'),
            'mac_address' => Yii::t('app', 'Mac Address'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['device_id' => 'id']);
    }

    public function getServiceName()
    {
        return Service::findOne(['id' => $this->service_id])->name;
    }
}
