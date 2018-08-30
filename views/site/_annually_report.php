<?php
use miloschuman\highcharts\Highcharts;

/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/30/18
 * Time: 11:08 AM
 */
?>

<?php echo Highcharts::widget([
    'options' => [
        'chart' => ['type' => 'column'],
        'title' => ['text' => 'Annually Report'],
        'credits' => [
            'enabled' => false
        ],
        'xAxis' => [
            'categories' => [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
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
                'data' => [49, 71, 10, 12, 14, 17, 13, 14, 3, 19, 56, 54]
            ],
            [
                'name' => 'Good',
                'data' => [10, 71, 68, 12, 14, 45, 49, 66, 21, 19, 56, 54]
            ],
            [
                'name' => 'Excellent',
                'data' => [56, 71, 98, 12, 41, 71, 13, 14, 74, 19, 56, 54]
            ]
        ]
    ]
]);
?>