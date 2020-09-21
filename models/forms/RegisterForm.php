<?php


namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\User;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['username'], 'unique', 'targetClass' => User::class],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::class],

            ['password', 'required'],
            ['password', 'string', 'min' => 6,]

        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $user = new User;
            $user->email = $this->email;
            $user->username = $this->username;
            $user->created_at = $time = time();
            $user->updated_at = $time;
            $user->auth_key = Yii::$app->security->generateRandomString(10);
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);

            return $user->save();

        }
        return false;
    }

}


















