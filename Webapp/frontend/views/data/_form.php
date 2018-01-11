<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Data */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DataTemperatur')->textInput() ?>

    <?= $form->field($model, 'DataGewicht')->textInput() ?>

    <?= $form->field($model, 'DataLicht')->textInput() ?>

    <?= $form->field($model, 'DataCo2')->textInput() ?>

    <?= $form->field($model, 'DataLuftfeuchtigkeit')->textInput() ?>

    <?= $form->field($model, 'seriennummer_idSeriennummer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
