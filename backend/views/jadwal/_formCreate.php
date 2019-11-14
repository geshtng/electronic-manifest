<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
use kartik\select2\Select2;

use backend\models\Pelabuhan;
use backend\models\Kapal;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">
    <?= Html::a('<i class="fa fa-arrow-circle-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
</div>
<br><br><br>
<div class="col-md-6">
    <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Form tambah jadwal keberangkatan</h3>
        </div>

        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'id' => 'jadwal-form',
            ]); ?>
            
                <div class="col-md-6">
                    <?= $form->field($model, 'tanggal')->widget(
                        DatePicker::classname(), [
                            'inline' => false, 
                            'template' => '{input}{addon}',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                            ],
                            'addon' => '<i class="fa fa-calendar"></i>',
                    ])->label("Tanggal berangkat");?>

                    <?= $form->field($model, 'waktu')->widget(
                        TimePicker::classname(), 
                        [
                            'name' => 't1',
                            'pluginOptions' => [
                                'showSeconds' => true,
                                'showMeridian' => false,
                                'minuteStep' => 5,
                                'secondStep' => 10,
                            ]
                        ]
                    )->label("Waktu berangkat") ?>
                </div>
                    
                <div class="col-md-6">
                    <?= $form->field($model, 'asal')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Pelabuhan::find()->all(), 'nama', 'nama', 'lokasi'),
                        'options' => ['placeholder' => 'Pelabuhan asal'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'addon' => [
                            'prepend' => [
                                'content' => '<i class="fa fa-arrow-left"></i>',
                            ],
                        ]
                    ]) ?>

                    <?= $form->field($model, 'tujuan')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Pelabuhan::find()->all(), 'nama', 'nama', 'lokasi'),
                        'options' => ['placeholder' => 'Pelabuhan tujuan'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'addon' => [
                            'prepend' => [
                                'content' => '<i class="fa fa-arrow-right"></i>',
                            ],
                        ]
                    ]) ?>
                </div>

               
                <div class="col-md-12">
                    <?= $form->field($model, 'kapal_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Kapal::find()->all(), 'id', 'nama'),
                        'options' => ['placeholder' => 'Kapal'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                        'addon' => [
                            'prepend' => [
                                'content' => '<i class="fa fa-ship"></i>',
                            ],
                        ]
                    ]) ?>

                    <div class="form-group pull-right">
                        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>           
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
