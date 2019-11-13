<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Penumpang */

$this->title = 'Create Penumpang';
$this->params['breadcrumbs'][] = ['label' => 'Penumpangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penumpang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
