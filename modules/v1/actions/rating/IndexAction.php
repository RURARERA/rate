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
        $id = Yii::$app->request->get('id');
        $state = Yii::$app->request->get('state');

        if ($id != null && $state >= 1 && $state <= 3) {

//            $device = Device::getDeviceByUuid($uuid);
            $device = Device::findOne($id);

            if (!empty($device)){
                $model = new Rating();
                $model->scenario = 'create';
                $model->device_id = $device->id;
                $model->service_id = $device->service_id;
                $model->state = $state;
                if ($model->save()){
                    $response->statusCode = HttpStatus::OK;
                    $response->data = [
                        'message' => 'Successfully created!',
                        'data' => $model->attributes,
                        'code' => $response->statusCode
                    ];
                }
                else {
                    $response->statusCode = HttpStatus::INTERNAL_SERVER_ERROR;
                    $response->data = [
                        'message' => 'Not created',
                        'code' => $response->statusCode
                    ];
                    return $response;
                }
            }
            else {
                $response->statusCode = HttpStatus::NOT_FOUND;
                $response->data = ['message' => 'Device not identified!', 'code' => $response->statusCode];
                return $response;
            }
        }
        else {
            $response->statusCode = HttpStatus::BAD_REQUEST;
            $response->data = ['message' => 'Bad Request!', 'code' => $response->statusCode];
            return $response;
        }
    }
}