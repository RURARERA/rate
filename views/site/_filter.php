<?php

use yii\helpers\Html;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 8/29/18
 * Time: 3:22 PM
 */
?>


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