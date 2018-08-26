<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sector".
 *
 * @property int $id
 * @property int $province_id
 * @property int $district_id
 * @property string $name
 * @property string $code
 */
class Sector extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sector';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id', 'district_id', 'name', 'code'], 'required'],
            [['province_id', 'district_id'], 'integer'],
            [['name'], 'string', 'max' => 75],
            [['code'], 'string', 'max' => 10],
            [['province_id', 'district_id', 'name'], 'unique', 'targetAttribute' => ['province_id', 'district_id', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'province_id' => Yii::t('app', 'Province ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
        ];
    }
}
