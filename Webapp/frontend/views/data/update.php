<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */

$this->title = 'Update Data: ' . $model->idData;
$this->params['breadcrumbs'][] = ['label' => 'Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idData, 'url' => ['view', 'id' => $model->idData]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
