<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 2:42 PM
 */

namespace app\modules\v1\actions\rating;

use app\helpers\HttpStatus;
use app\modules\v1\models\Device;
use app\modules\v1\models\Rating;
use Yii;
use yii\rest\Action;
use yii\web\Response;

class IndexAction extends Action
{
    public function run()
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $uuid = Yii::$app->request->get('uuid');
        $state = Yii::$app->request->get('state');

        if ($uuid != null && ($state >= 1 && $state <= 3)) {

            $device = Device::getDeviceByMacAddress($uuid);

            if (!empty($device)){
                $model = new Rating();
                $model->device_id = $device->id;
                $model->service_id = $device->service_id;
                $model->state = $state;
                $model->save();
            }
            else {
                $response->statusCode = HttpStatus::NOT_FOUND;
                $response->data = ['message' => 'Device not identified!', 'code' => $response->statusCode];
                return $response;
            }

            $response->statusCode = HttpStatus::OK;
            $response->data = ['message' => 'OK', 'data' => $model->attributes, 'code' => $response->statusCode];
        }
        else {
            $response->statusCode = HttpStatus::BAD_REQUEST;
            $response->data = ['message' => 'Bad Request!', 'code' => $response->statusCode];
            return $response;
        }
    }
}