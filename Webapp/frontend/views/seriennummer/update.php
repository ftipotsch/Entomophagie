<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seriennummer */

$this->title = 'Update Seriennummer: ' . $model->idSeriennummer;
$this->params['breadcrumbs'][] = ['label' => 'Seriennummers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSeriennummer, 'url' => ['view', 'id' => $model->idSeriennummer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seriennummer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
