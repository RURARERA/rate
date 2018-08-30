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
    <div class="col-lg-12">
        <?php echo $this->render('_filter', [
            'services' => $services,
            'model' => $model,
        ]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">

            <div class="panel-body">
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
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $this->render('_improvement', [
                    'current_week_improvement_report' => $current_week_improvement_report,
                    'last_week_improvement_report' => $last_week_improvement_report,
                ]); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $this->render('_annual_report', []); ?>

            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php echo $this->render('_report_by_service', []); ?>
            </div>
        </div>
    </div>
</div>
