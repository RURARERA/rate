<?php
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Upload Code File</h1>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

            <?= $form->field($model, 'file')->fileInput() ?>

            <button>Submit</button>

            <?php ActiveForm::end() ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
