<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/24/18
 * Time: 2:42 PM
 */

namespace app\modules\v1\actions;

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

        $headers = Yii::$app->request->headers;



        if ($model->save(false)) {
            $response->statusCode = 201;
            $response->data = ['message' => 'Successfully created!', 'data' => $model->attributes, 'code' => $response->statusCode];
            return $response;

        } else {
            $response->statusCode = 401;
            $response->data = ['message' => 'Ticket not created!', 'code' => $response->statusCode];
            return $response;
        }
    }
}