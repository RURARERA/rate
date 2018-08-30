<?php
use miloschuman\highcharts\Highcharts;

/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/30/18
 * Time: 11:34 AM
 */
?>

<?php echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Improvement Report'],
        'credits' => [
            'enabled' => false
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Number of ratings'
            ]
        ],
        'plotOptions' => [
            'series' => [
                'label' => [
                    'connectorAllowed' => false,
                ],
            ],
        ],
        'series' => [
            [
                'name' => 'This week',
                'data' => [49, 71, 10, 12, 14, 17, 13, 14, 3, 19, 56, 54]
            ],
            [
                'name' => 'Last Week',
                'data' => [10, 71, 68, 12, 14, 45, 49, 66, 21, 19, 56, 54]
            ],
        ],
    ]
]);
?>
