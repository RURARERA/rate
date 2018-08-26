<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 5:20 PM
 */

namespace app\helpers;

use app\models\Cell;
use app\models\District;
use app\models\Sector;

class DataHelper
{
    public static function getDistricts($province_id)
    {
        return District::find()
            ->where(['province_id' => $province_id])
            ->select(['id', 'name'])
            ->orderBy('name')
            ->asArray()
            ->all();
    }

    public static function getSectors($district_id)
    {
        return Sector::find()
            ->where(['district_id' => $district_id])
            ->select(['id', 'name'])
            ->orderBy('name')
            ->asArray()
            ->all();
    }

    public static function getCells($sector_id)
    {
        return Cell::find()
            ->where(['sector_id' => $sector_id])
            ->select(['id', 'name'])
            ->orderBy('name')
            ->asArray()
            ->all();
    }
}