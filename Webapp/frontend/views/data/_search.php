<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idData') ?>

    <?= $form->field($model, 'DataTemperatur') ?>

    <?= $form->field($model, 'DataGewicht') ?>

    <?= $form->field($model, 'DataLicht') ?>

    <?= $form->field($model, 'DataCo2') ?>

    <?php // echo $form->field($model, 'DataLuftfeuchtigkeit') ?>

    <?php // echo $form->field($model, 'seriennummer_idSeriennummer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
