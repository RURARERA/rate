<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "location".
 *
 * @property int $id
 * @property string $name
 * @property int $tin_number
 * @property string $address
 * @property int $cell_id
 * @property int $sector_id
 * @property int $district_id
 * @property int $province_id
 * @property int $status 1: active, 0: inactive
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Contact[] $contacts
 * @property LocationHasService[] $locationHasServices
 */
class Location extends \yii\db\ActiveRecord
{

    public $service;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'cell_id', 'sector_id', 'district_id', 'province_id'], 'required'],
            [['tin_number', 'cell_id', 'sector_id', 'district_id', 'province_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'tin_number' => Yii::t('app', 'Tin Number'),
            'address' => Yii::t('app', 'Address'),
            'cell_id' => Yii::t('app', 'Cell'),
            'sector_id' => Yii::t('app', 'Sector'),
            'district_id' => Yii::t('app', 'District'),
            'province_id' => Yii::t('app', 'Province'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['institution_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocationHasServices()
    {
        return $this->hasMany(LocationHasService::className(), ['location_id' => 'id']);
    }

    public static function getLocationHasServices_($location_id)
    {
        $subQuery = (new Query())
            ->select('DISTINCT `service`.`id`')
            ->from('`location_has_service`, `service`')
            ->where('`location_has_service`.`location_id`=' . $location_id)
            ->andWhere('`location_has_service`.`service_id` = `service`.`id`')
            ->all();

        return Service::find()
            ->where(['in', 'id' , $subQuery]);
    }
}
