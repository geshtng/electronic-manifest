<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jadwal */

$this->title = 'Tambah Jadwal Keberangkatan';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Keberangkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-create">

    <?= $this->render('_formCreate', [
        'model' => $model,
    ]) ?>

</div>
