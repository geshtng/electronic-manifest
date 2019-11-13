<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kapal */

$this->title = 'Create Kapal';
$this->params['breadcrumbs'][] = ['label' => 'Kapals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kapal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
