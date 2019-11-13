<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelabuhan */

$this->title = 'Update Pelabuhan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pelabuhans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelabuhan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
