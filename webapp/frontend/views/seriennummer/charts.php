<?php

use yii\helpers\Html;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SeriennummerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Charts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seriennummer-charts">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);

        $models = $data->getModels();

    $result = ArrayHelper::index($models, 'idData');
    print_r($result);

    ?>

    <?= Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Datenauswertung'],
            'xAxis' => [
                'categories' => ['Temperatur', 'Gewicht', 'Licht', 'Co2', 'Luftfeuchtigkeit']
            ],
            'yAxis' => [
                'title' => ['text' => 'Daten']
            ],
            'series' => [
                $result
            ]
        ]
    ]);?>
</div>
