<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = Yii::t('app', 'Update Location: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5></h5>
        </div>

        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'districts' => $districts,
                'services' => $services,
                'selected_services' => $selected_services,
                'service_dataProvider' => $service_dataProvider,
            ]) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Services</h5>
        </div>

        <div class="panel-body">
            <?= $this->render('_services', [
                'service_dataProvider' => $service_dataProvider,
            ]) ?>
        </div>
    </div>

</div>
