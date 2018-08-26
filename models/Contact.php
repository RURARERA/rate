<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property int $institution_id
 * @property string $email_address
 * @property string $phone_number
 * @property string $created_at
 * @property string $updated_at
 * @property int $status 1: active, 0: inactive
 *
 * @property Location $institution
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institution_id', 'email_address', 'phone_number', 'created_at'], 'required'],
            [['institution_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email_address'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'institution_id' => Yii::t('app', 'Institution ID'),
            'email_address' => Yii::t('app', 'Email Address'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Location::className(), ['id' => 'institution_id']);
    }
}
