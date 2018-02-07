<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use common\models\Seriennummer;
use yii;
use yii\base;
use yii\rbac;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $Seriennummer_Seriennumern;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['Seriennummer_Seriennumern', 'required'],
            ['Seriennummer_Seriennumern', 'unique','targetClass' => '\common\models\User', 'message' => 'This Seriennummer has already been taken.'],
            ['Seriennummer_Seriennumern', 'integer', 'min' => 8 ],
            ['Seriennummer_Seriennumern', 'exist', 'targetClass' => 'common\models\Seriennummer', 'targetAttribute' => 'Seriennummern'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->Seriennummer_Seriennumern = $this->Seriennummer_Seriennumern;

        $seriennummer = Seriennummer::find()->where(['Seriennummern' => ''.$this->Seriennummer_Seriennumern])->one();
        $seriennummer->SeriennumerAktiviert = 1;
        $user->Seriennummer_id = $seriennummer->idSeriennummer;




        return $user->save()&& $seriennummer->save() ? $user : null;


        }


}
