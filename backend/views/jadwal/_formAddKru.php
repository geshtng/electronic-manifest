<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Penumpang;

/* @var $this yii\web\View */
/* @var $model backend\models\Penumpang */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $modelPenumpang = new Penumpang(); ?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]) ?>

<?= $form->field($modelPenumpang, 'nama')->textInput(['maxlength' => true]) ?>

<?= $form->field($modelPenumpang, 'posisi')->radioList([0 => "Nahkoda", 1 => "ABK"]) ?>

<?= $form->field($modelPenumpang, 'alamat')->textInput(['maxlength' => true]) ?>

<?= $form->field($modelPenumpang, 'umur')->textInput() ?>

<?= $form->field($modelPenumpang, 'jenis_kelamin')->radioList([1 => "Laki - Laki", 2 => "Perempuan"]) ?>    

<div class="form-group">
    <div class="col-md-1 col-md-offset-2">
        <?= Html::submitButton('Tambah', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
