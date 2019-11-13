<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PenumpangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penumpang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'umur') ?>

    <?php // echo $form->field($model, 'no_kendaraan') ?>

    <?php // echo $form->field($model, 'posisi') ?>

    <?php // echo $form->field($model, 'jadwal_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
