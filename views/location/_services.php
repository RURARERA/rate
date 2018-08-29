<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/29/18
 * Time: 5:20 PM
 */
?>

<?= GridView::widget([
    'dataProvider' => $service_dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete-service}',
            'buttons' => [

                'delete-service' => function ($url, $model) {
                    return Html::a(Html::tag('i', '', ['class' => 'fa fa-trash']), ['delete-service', 'id' => $model->id], [
                        'class' => 'btn btn-danger btn-xs',
                        'data' => [
                            'confirm' => Yii::t('app', '\'Are you sure you want to delete this item?'),
                        ],
                    ]);
                },
            ],
        ],
    ],
]); ?>
