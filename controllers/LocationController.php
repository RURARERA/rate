<?php

namespace app\controllers;

use app\components\controllers\BaseController;
use app\helpers\Helper;
use app\models\District;
use app\models\LocationHasService;
use app\models\Service;
use Yii;
use app\models\Location;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationController implements the CRUD actions for Location model.
 */
class LocationController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Location models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Location::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Location model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Location model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Location();
        $districts = ArrayHelper::map(District::find()->orderBy('name')->all(), 'id', 'name');
        $services = ArrayHelper::map(Service::find()->orderBy('name')->all(), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {

            $transaction = $model->getDb()->beginTransaction();
            try {
                $post = Yii::$app->request->post('Location');
                $district = District::findOne($post['district_id']);
                $service_ids = $post['service'];

                if(!empty($district)){
                    $model->province_id = $district->province_id;
                }


                $model->save();

                if(!empty($service_ids)){

                    foreach ($service_ids as $service_id) {
                        $location_has_service = new LocationHasService();
                        $location_has_service->location_id = $model->id;
                        $location_has_service->service_id = $service_id;
                        $location_has_service->save();

                    }
                }
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        Yii::warning($model->errors);
        return $this->render('create', [
            'model' => $model,
            'districts' => $districts,
            'services' => $services,
        ]);
    }

    /**
     * Updates an existing Location model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $districts = ArrayHelper::map(District::find()->orderBy('name')->all(), 'id', 'name');
        $services = ArrayHelper::map(Service::find()->orderBy('name')->all(), 'id', 'name');
        $selected_services = $model->locationHasServices;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $transaction = $model->getDb()->beginTransaction();
            try {
                $post = Yii::$app->request->post('Location');
                $district = District::findOne($post['district_id']);
                $service_ids = $post['service'];

                if(!empty($district)){
                    $model->province_id = $district->province_id;
                }


                $model->save();

                if(!empty($service_ids)){

                    foreach ($service_ids as $service_id) {
                        $location_has_service = new LocationHasService();
                        $location_has_service->location_id = $model->id;
                        $location_has_service->service_id = $service_id;
                        $location_has_service->save();

                    }
                }
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        Yii::warning($model->errors);
        return $this->render('update', [
            'model' => $model,
            'districts' => $districts,
            'services' => $services,
            'selected_services' => $selected_services,
        ]);
    }

    /**
     * Deletes an existing Location model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Location model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Location the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Location::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
