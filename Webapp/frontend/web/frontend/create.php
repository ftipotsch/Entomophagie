<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Seriennummer */

$this->title = 'Create Seriennummer';
$this->params['breadcrumbs'][] = ['label' => 'Seriennummers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seriennummer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
