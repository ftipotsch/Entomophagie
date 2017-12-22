<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SeriennummerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seriennummers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seriennummer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Seriennummer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSeriennummer',
            'Seriennummern',
            'SeriennumerAktiviert',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
