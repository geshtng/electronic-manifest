<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'waktu')->textInput() ?>

    <?= $form->field($model, 'asal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kapal_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
