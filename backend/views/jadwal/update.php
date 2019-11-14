<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */

$this->title = 'Ubah Jadwal Keberangkatan: ' . $model->asal . '-' . $model->tujuan;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Keberangkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->asal . '-' . $model->tujuan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-update">
    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
