<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Data;

/**
 * DataSearch represents the model behind the search form about `frontend\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idData', 'seriennummer_idSeriennummer'], 'integer'],
            [['DataTemperatur', 'DataGewicht', 'DataLicht', 'DataCo2', 'DataLuftfeuchtigkeit'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Data::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idData' => $this->idData,
            'DataTemperatur' => $this->DataTemperatur,
            'DataGewicht' => $this->DataGewicht,
            'DataLicht' => $this->DataLicht,
            'DataCo2' => $this->DataCo2,
            'DataLuftfeuchtigkeit' => $this->DataLuftfeuchtigkeit,
            'seriennummer_idSeriennummer' => $this->seriennummer_idSeriennummer,
        ]);

        return $dataProvider;
    }
}
