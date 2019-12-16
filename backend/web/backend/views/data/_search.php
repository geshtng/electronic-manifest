<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\DataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'jk') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'umur') ?>

    <?php // echo $form->field($model, 'no_kendaraan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
