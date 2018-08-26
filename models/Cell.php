<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cell".
 *
 * @property int $id
 * @property int $province_id
 * @property int $district_id
 * @property int $sector_id
 * @property string $name
 * @property string $code
 */
class Cell extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cell';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id', 'district_id', 'sector_id', 'name', 'code'], 'required'],
            [['province_id', 'district_id', 'sector_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 6],
            [['province_id', 'district_id', 'sector_id', 'name'], 'unique', 'targetAttribute' => ['province_id', 'district_id', 'sector_id', 'name']],
            [['code'], 'unique'],
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
            'sector_id' => Yii::t('app', 'Sector ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
        ];
    }
}
