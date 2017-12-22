<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Seriennummer */

$this->title = $model->idSeriennummer;
$this->params['breadcrumbs'][] = ['label' => 'Seriennummers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seriennummer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idSeriennummer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idSeriennummer], [
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
            'idSeriennummer',
            'Seriennummern',
            'SeriennumerAktiviert',
        ],
    ]) ?>

</div>
