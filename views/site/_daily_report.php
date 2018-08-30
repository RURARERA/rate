<?php
use miloschuman\highcharts\Highcharts;

/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/29/18
 * Time: 3:26 PM
 */
?>
<div class="panel-body">
    <?php echo Highcharts::widget([
        'options' => [
            'chart' => [
                'type' => 'pie',
                'plotBackgroundColor' => null,
                'plotBorderWidth' => null,
                'plotShadow' => false
            ],
            'credits' => [
                'enabled' => false
            ],

            'plotOptions' => [
                'pie' => [
                    'allowPointSelect' => true,
                    'cursor' => null,
                    'dataLabels' => [
                        'enabled' => true,
                        'format' => '<b>{point.name}</b>: {point.percentage:.1f} %',
                        'style' => [
                            'color' => 'black',
                        ],
                    ],
                ],
            ],

            'title' => ['text' => 'Daily Report'],
            'colors' => ['red', 'yellow', 'green'],
            'series' => [
                [
                    'name' => 'Services',
                    'data' => [
                        [
                            'name' => 'Bad',
                            'y' => $bad_daily_report,
                        ],
                        [
                            'name' => 'Good',
                            'y' => $good_daily_report,
                        ],
                        [
                            'name' => 'Excellent',
                            'y' => $excellent_daily_report,
                        ],
                    ]
                ],
            ]
        ]
    ]);
    ?>
</div>

