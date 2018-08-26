<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 5:19 PM
 */

namespace app\components\actions;

use app\helpers\DataHelper;
use yii\helpers\Json;
use Yii;
use yii\base\Action;
use yii\web\Response;

class LocationAction extends Action
{
    public $action;

    public function run()
    {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];

            if ($parents != null) {
                $cat_id = $parents[0];

                if ($this->action == 'districts') {
                    $out = DataHelper::getDistricts($cat_id);
                } elseif ($this->action == 'sectors') {
                    $out = DataHelper::getSectors($cat_id);
                } elseif ($this->action == 'cells') {
                    $out = DataHelper::getCells($cat_id);
                } else {
                    $out = null;
                }
                return Json::encode(['output' => $out, 'selected' => '']);;
            }
        }
//        echo Json::encode(['output' => '', 'selected' => '']);
    }
}