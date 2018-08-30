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
                    'connectorAllowed' => true,
                ],
            ],
        ],
        'series' => [
            [
                'name' => 'Current Week Report',
                'data' => $current_week_improvement_report
            ],
            [
                'name' => 'Previous Week Report',
                'data' => $last_week_improvement_report
            ],
        ],
    ]
]);
?>
