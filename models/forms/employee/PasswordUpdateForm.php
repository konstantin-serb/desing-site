<?php

namespace app\models\forms\employee;

use app\models\User;
use Yii;
use yii\base\Model;



class PasswordUpdateForm extends Model
{


    public $currentPassword;
    public $password;
    public $repeatPassword;
    public $userId;


    public function __construct()
    {
        $this->userId = Yii::$app->user->identity->getId();
    }


    public function rules()
    {
        return [
            [['password', 'currentPassword', 'repeatPassword'], 'required'],
            [['password'], 'string', 'length' => [2, 10]],
            ['currentPassword', 'validatePassword'],
            [['repeatPassword'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findOne($this->userId);

        if (!$user || !$user->validatePassword($this->currentPassword)) {
            $this->addError($attribute, 'Неправильный пароль');
        }
    }


    public function savePassword()
    {

        if ($this->validate()) {
            $user = User::findOne($this->userId);
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->updated_at = time();
            if ($user->save()) {
                return true;
            }
        }
    }




}

