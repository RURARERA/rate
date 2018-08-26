<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cells');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cell-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cell'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'province_id',
            'district_id',
            'sector_id',
            'name',
            //'code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
