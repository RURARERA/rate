<?php


use yii\helpers\Html;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">

    <?php echo $this->render('_filter', [
        'services' => $services,
        'model' => $model,
    ]) ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Daily Report</h5>
        </div>

        <?php if ($excellent_daily_report == 0 && $good_daily_report == 0 && $bad_daily_report == 0) { ?>
            <div class="alert alert-info">No data available!</div>
        <?php } else {
            echo $this->render('_daily_report', [
                'excellent_daily_report' => $excellent_daily_report,
                'good_daily_report' => $good_daily_report,
                'bad_daily_report' => $bad_daily_report,
            ]);
        } ?>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Monthly Report</h5>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <?php echo Highcharts::widget([
                'options' => [
                    'chart' => ['type' => 'column'],
                    'title' => ['text' => 'Customer Satisfaction'],
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
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Report by Service</h5>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <?php echo Highcharts::widget([
                'options' => [
                    'chart' => ['type' => 'column'],
                    'title' => ['text' => 'Customer Satisfaction'],
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
                    'series' => [
                        [
                            'name' => 'Bad',
                            'data' => [49, 71, 10]
                        ],
                        [
                            'name' => 'Good',
                            'data' => [10, 71, 68]
                        ],
                        [
                            'name' => 'Excellent',
                            'data' => [56, 71, 98]
                        ]
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>
</div>
<!-- /.row -->

