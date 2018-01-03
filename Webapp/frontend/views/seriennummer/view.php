<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Seriennummer */

$this->title = $model->idSeriennummer;
$this->params['breadcrumbs'][] = ['label' => 'Seriennummer', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Ihre Seriennummer";
?>
<div class="seriennummer-view">

    <h1><?= Html::encode("Ihre Seriennummer") ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Seriennummern',
            'SeriennumerAktiviert',
        ],
    ]) ?>

</div>
