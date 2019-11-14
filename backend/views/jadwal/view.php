<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;
use yii\grid\GridView;

use backend\models\Penumpang;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */

$this->title = $model->asal . '-' . $model->tujuan;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Keberangkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">
    <p>
        <?php if ($model->status == "0") { ?>
            <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Anda yakin ingin menghapus data ini?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>
    
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="box-title">Data jadwal keberangkatan</div>
        </div>
        <div class="box-body">
            <?php
                $penumpangSekarang = Penumpang::find()->where(['jadwal_id' => $model->id])->count();   
            ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'tanggal',
                        'label' => 'Tanggal berangkat',
                    ],
                    [
                        'attribute' => 'waktu',
                        'label' => 'Waktu berangkat',
                    ],
                    [
                        'attribute' => 'asal',
                        'label' => 'Pelabuhan asal',
                    ],
                    [
                        'attribute' => 'tujuan',
                        'label' => 'Pelabuhan tujuan',
                    ],
                    [
                        'attribute' => 'kapal_id',
                        'value' =>  $model->kapal->nama,
                        'label' => 'Kapal',
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($data){
                            return ($data->status == "1") ? '<small class="external-event bg-green">Selesai</small>' : '<small class="external-event bg-red">Belum berangkat</small>';
                        },
                    ],
                    [
                        'attribute' => 'kapal_id',
                        'value' => $penumpangSekarang .' / ' .$model->kapal->kapasitas,
                        'label' => 'Kapasitas kapal',
                    ],
                ],
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-users"></i>
                    <h3 class="box-title">Data Penumpang</h3>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#data_1" data-toggle="tab"><i class="fa fa-users"></i> Data Penumpang</a></li>
                            <li><a href="#data_2" data-toggle="tab"><i class="fa fa-life-saver"></i> Data Kru</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="data_1">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProviderPenumpang,
                                    'filterModel' => $searchModelPenumpang,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'nama',
                                        [
                                            'attribute' => 'Jenis Kelamin',
                                            'value' => function($model){
                                                if($model->jenis_kelamin == 1)
                                                    return "Laki - Laki";
                                                else
                                                    return "Perempuan";
                                            }
                                        ],
                                        'alamat',
                                        'umur',
                                        'no_kendaraan',
                                        [
                                            'attribute' => 'Keterangan',
                                            'value' => function($model){
                                                if($model->posisi == 0){
                                                    return "Nahkoda";
                                                }
                                                else if($model->posisi == 1)
                                                    return "Kernet";
                                                else
                                                    return "Penumpang";
                                            }
                                        ],
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>
                            <div class="tab-pane" id="data_2">
                                <?= GridView::widget([
                                    'dataProvider' => $dataProviderKru,
                                    'filterModel' => $searchModelPenumpang,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'nama',
                                        [
                                            'attribute' => 'Jenis Kelamin',
                                            'value' => function($model){
                                                if($model->jenis_kelamin == 1)
                                                    return "Laki - Laki";
                                                else
                                                    return "Perempuan";
                                            }
                                        ],
                                        'alamat',
                                        'umur',
                                        [
                                            'attribute' => 'Keterangan',
                                            'value' => function($model){
                                                if($model->posisi == 0){
                                                    return "Nahkoda";
                                                }
                                                else if($model->posisi == 1)
                                                    return "Kernet";
                                                else
                                                    return "Penumpang";
                                            }
                                        ],
                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-user-plus"></i>
                    <h3 class="box-title">Tambah penumpang</h3>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tambah_1" data-toggle="tab"><i class="fa fa-users"></i> Tambah Penumpang</a></li>
                            <li><a href="#tambah_2" data-toggle="tab"><i class="fa fa-life-saver"></i> Tambah Kru</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tambah_1">
                                <?= $this->render('_formAddPenumpang', [
                                    'model' => $model,
                                ]) ?>
                            </div>
                            <div class="tab-pane" id="tambah_2">
                                <?= $this->render('_formAddKru', [
                                    'model' => $model,
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

   
</div>