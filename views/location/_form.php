<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Location */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-6 col-lg-6">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'service')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'tin_number')->textInput() ?>
        </div>
        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-lg-4">
            <?php echo $form->field($model, 'district_id')->dropDownList($districts, [
                'id' => 'district_id',
                'prompt' => Yii::t('app', 'District'),
            ]);
            ?>
        </div>
        <div class="col-md-4 col-lg-4">
            <?php echo $form->field($model, 'sector_id')->widget(DepDrop::className(), [
                'options' => ['id' => 'sector_id'],
                'data' => $this->context->accessSectors($model->district_id),
                'pluginOptions' => [
                    'depends' => ['district_id'],
                    'placeholder' => Yii::t('app', 'Sector'),
                    'url' => Url::to(['/location/sectors'])
                ]
            ]);
            ?>
        </div>
        <div class="col-md-4 col-lg-4">
            <?php echo $form->field($model, 'cell_id')->widget(DepDrop::classname(), [
                'options' => ['id' => 'cell_id'],
                'data' =>$this->context->accessCells($model->sector_id),
                'pluginOptions' => [
                    'depends' => ['sector_id'],
                    'placeholder' => 'Cell',
                    'url' => Url::to(['/location/cells'])
                ]
            ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>




</div>
