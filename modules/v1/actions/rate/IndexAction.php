<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 2:42 PM
 */

namespace app\modules\v1\actions\rate;

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
        $post = Yii::$app->request->bodyParams;

        $uuid = $post['uuid'];
        $state = $post['uuid'];

        if ($uuid != null && $state != null) {

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

            $response->statusCode = HttpStatus::NOT_FOUND;
            $response->data = ['message' => 'Successfully created!', 'data' => $model->attributes, 'code' => $response->statusCode];
        }
        else {
            $response->statusCode = HttpStatus::BAD_REQUEST;
            $response->data = ['message' => 'Bad Request!', 'code' => $response->statusCode];
            return $response;
        }
    }
}