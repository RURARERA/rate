<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Location */

$this->title = Yii::t('app', 'Create Location');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Daily Report</h5>
        </div>

        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'districts' => $districts,
                'services' => $services,
            ]) ?>
        </div>
    </div>

</div>


