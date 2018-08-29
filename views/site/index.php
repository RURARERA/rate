<?php

use miloschuman\highcharts\Highcharts;

use yii\helpers\Html;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;

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
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>Filter</h5>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get']); ?>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <?php echo $form->field($model, 'service_id')->dropDownList($services, [
                            'prompt' => Yii::t('app', 'Service'),
                        ])->label(false); ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php echo $form->field($model, 'time_', [
                            'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-calendar"></i>']],
                            'options' => ['class' => 'drp-container form-group']
                        ])->widget(DateRangePicker::classname(), [
                            'useWithAddon' => true,
                            'convertFormat' => true,
                            'startAttribute' => 'datetime_start',
                            'endAttribute' => 'datetime_end',
                            'pluginOptions' => [
                                'locale' => [
                                    'format' => 'Y-m-d H:i:s',
                                    'separator'=>' to ',

                                ],
                            ]
                        ])->label(false); ?>
                    </div>
                    <!--<div class="col-sm-12 col-md-6">
                        <?php /*echo $form->field($model, 'time_')->widget(DatePicker::classname(), [
                            'attribute' => 'datetime_start',
                            'attribute2' => 'datetime_end',
                            'options' => ['placeholder' => 'Start date'],
                            'options2' => ['placeholder' => 'End date'],
                            'type' => DatePicker::TYPE_RANGE,
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose'=>true
                            ]
                        ])->label(false); */ ?>
                    </div>-->
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="filter-actions">
                            <?= Html::submitButton(Yii::t('app', 'Filter'), ['class' => 'btn btn-primary']) ?>

                            <a href="<?php echo Url::to(['index']) ?>">
                                <i class="fa fa-close"></i>
                                <?php echo Yii::t('app', 'Reset Filter') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Daily Report</h5>
        </div>
        <!-- /.panel-heading -->
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
                        ],
                    ],

                    'title' => ['text' => 'Customer Satisfaction'],
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

