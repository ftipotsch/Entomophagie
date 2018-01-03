<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "seriennummer".
 *
 * @property integer $idSeriennummer
 * @property integer $Seriennummern
 * @property integer $SeriennumerAktiviert
 *
 * @property User[] $users
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['Seriennummer_idSeriennummer' => 'idSeriennummer']);
    }
}
