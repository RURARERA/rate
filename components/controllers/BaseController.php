<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 5:24 PM
 */

namespace app\components\controllers;

use app\helpers\DataHelper;
use app\helpers\Helper;
use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function actions()
    {
        return [

            'districts' => [
                'action' => 'districts',
                'class' => 'app\components\actions\LocationAction',
            ],
            'sectors' => [
                'action' => 'sectors',
                'class' => 'app\components\actions\LocationAction',
            ],
            'cells' => [
                'action' => 'cells',
                'class' => 'app\components\actions\LocationAction',
            ],
        ];
    }

    public static function invertIndexesInArray($array)
    {
        $new_array = array();
        foreach ($array as $i => $element):
            foreach ($element as $j => $sub_element) {
                $new_array[$j] = $sub_element;
            }
        endforeach;
        return $new_array;
    }

    public static function getDataInArray($models)
    {
        $array = array();
        if (is_array($models)) {
            foreach ($models as $model => $val):
                $id = $val['id'];
                $name = $val['name'];
                array_push($array, [$id => $name]);
            endforeach;
        }
        return self::invertIndexesInArray($array);
    }

    public function accessDistricts($province_id)
    {
        return self::getDataInArray(DataHelper::getDistricts($province_id));
    }

    public function accessSectors($district_id)
    {
        return self::getDataInArray(DataHelper::getSectors($district_id));
    }

    public function accessCells($sector_id)
    {
        return self::getDataInArray(DataHelper::getCells($sector_id));
    }
}