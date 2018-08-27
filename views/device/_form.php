<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <?php echo $form->field($model, 'location_id')->dropDownList($locations, [
                'prompt' => Yii::t('app', 'Location'),
            ]);
            ?>

            <?php echo $form->field($model, 'service_id')->dropDownList($services, [
                'prompt' => Yii::t('app', 'Service'),
            ]);
            ?>

            <?= $form->field($model, 'mac_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
