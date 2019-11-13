<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelabuhan */

$this->title = 'Create Pelabuhan';
$this->params['breadcrumbs'][] = ['label' => 'Pelabuhans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelabuhan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
