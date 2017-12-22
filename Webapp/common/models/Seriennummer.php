<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seriennummer".
 *
 * @property integer $idSeriennummer
 * @property integer $Seriennummern
 * @property integer $SeriennumerAktiviert
 *
 * @property User $seriennummern
 */
class Seriennummer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seriennummer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSeriennummer', 'Seriennummern'], 'required'],
            [['idSeriennummer', 'Seriennummern', 'SeriennumerAktiviert'], 'integer'],
            [['Seriennummern'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['Seriennummern' => 'Seriennummer_Seriennumern']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSeriennummer' => 'Id Seriennummer',
            'Seriennummern' => 'Seriennummern',
            'SeriennumerAktiviert' => 'Seriennumer Aktiviert',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeriennummern()
    {
        return $this->hasOne(User::className(), ['Seriennummer_Seriennumern' => 'Seriennummern']);
    }
}
