<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/29/18
 * Time: 11:56 AM
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm  extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'safe'],
            [['file'], 'file', 'extensions'=>'txt'],
        ];
    }
}