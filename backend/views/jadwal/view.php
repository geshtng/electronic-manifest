<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */

$this->title = $model->asal . '-' . $model->tujuan;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Keberangkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tanggal',
            'waktu',
            'asal',
            'tujuan',
            [
                'attribute' => 'kapal_id',
                'value' =>  $model->kapal->nama,
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    return ($data->status == "1") ? '<small class="external-event bg-green">Selesai</small>' : '<small class="external-event bg-red">Belum berangkat</small>';
                }
            ],
        ],
    ]) ?>

</div>
