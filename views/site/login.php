<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <img style="margin-top: 100px; margin-bottom: -80px;" src="<?php echo Yii::getAlias('@web').'/'. Yii::$app->params['logo'] ?>">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Yii::t('app', 'Please Sign In'); ?></h3>
            </div>
            <div class="panel-body">

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true, 'placeholder' => Yii::t('app', 'Enter your email')])->label(false); ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => Yii::t('app', 'Enter your password')])->label(false); ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-lg btn-success btn-block', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>