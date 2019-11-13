<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Penumpang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penumpang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'umur')->textInput() ?>

    <?= $form->field($model, 'no_kendaraan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jadwal_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
