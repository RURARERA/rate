<?php
use miloschuman\highcharts\Highcharts;

/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/30/18
 * Time: 11:13 AM
 */
?>
<?php echo Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'column'],
        'title' => ['text' => 'Report by Service'],
        'credits' => [
            'enabled' => false
        ],
        'xAxis' => [
            'categories' => [
                'Hotel',
                'Restaurant',
                'Bar'
            ],
            'crosshair' => true,
        ],
        'yAxis' => [
            'min' => 0,
            'title' => [
                'text' => 'Number of ratings'
            ]
        ],
        'plotOptions' => [
            'pie' => [
                'pointPadding' => 0.2,
                'borderWidth' => 0,
            ],
        ],
        'colors' => ['red', 'yellow', 'green'],
        'series' => [
            [
                'name' => 'Bad',
                'data' => [49, 71, 40]
            ],
            [
                'name' => 'Good',
                'data' => [10, 71, 68,40]
            ],
            [
                'name' => 'Excellent',
                'data' => [56, 71, 98,40]
            ]
        ]
    ]
]);
?>
