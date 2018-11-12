<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "location_has_service".
 *
 * @property int $location_id
 * @property int $service_id
 *
 * @property Location $location
 * @property Service $service
 */
class LocationHasService extends \yii\db\ActiveRecord

{  
     
    /**
     * {@inheritdoc}
     */
    public static function tableName()

    {   
        return 'location_has_service';
    }

    /**
     * {@inheritdoc}
     */
   public $service_id;
    //public $location_id;

    public function rules()
    {
        return [
            [['location_id', 'service_id'], 'integer','required'],
            [['location_id', 'service_id'], 'integer'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'location_id' => Yii::t('app', 'Location ID'),
            'service_id' => Yii::t('app', 'Service ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }

    public static function getNotLocationHasServices($location_id)
    {
        $subQuery = (new Query())
            ->select('DISTINCT `service`.`id`')
            ->from('`location_has_service`, `service`')
            ->where('`location_has_service`.`location_id`=' . $location_id)
            ->andWhere('`location_has_service`.`service_id`=`service`.`id`')
            ->all();

        return ArrayHelper::map(Service::find()
            ->where(['not in', 'id' , $subQuery])
            ->all(), 'id', 'name');
    }
}
