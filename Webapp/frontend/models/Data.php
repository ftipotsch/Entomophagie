<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property integer $idData
 * @property double $DataTemperatur
 * @property double $DataGewicht
 * @property double $DataLicht
 * @property double $DataCo2
 * @property double $DataLuftfeuchtigkeit
 * @property integer $seriennummer_idSeriennummer
 *
 * @property Seriennummer $seriennummerIdSeriennummer
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DataTemperatur', 'DataGewicht', 'DataLicht', 'DataCo2', 'DataLuftfeuchtigkeit'], 'number'],
            [['seriennummer_idSeriennummer'], 'required'],
            [['seriennummer_idSeriennummer'], 'integer'],
            [['seriennummer_idSeriennummer'], 'exist', 'skipOnError' => true, 'targetClass' => Seriennummer::className(), 'targetAttribute' => ['seriennummer_idSeriennummer' => 'idSeriennummer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idData' => 'Id Data',
            'DataTemperatur' => 'Data Temperatur',
            'DataGewicht' => 'Data Gewicht',
            'DataLicht' => 'Data Licht',
            'DataCo2' => 'Data Co2',
            'DataLuftfeuchtigkeit' => 'Data Luftfeuchtigkeit',
            'seriennummer_idSeriennummer' => 'Seriennummer Id Seriennummer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeriennummerIdSeriennummer()
    {
        return $this->hasOne(Seriennummer::className(), ['idSeriennummer' => 'seriennummer_idSeriennummer']);
    }
}
