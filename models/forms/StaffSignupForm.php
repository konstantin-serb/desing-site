<?php


namespace app\models\forms;

use app\models\Employee;
use yii\base\Model;
use app\models\User;
use Yii;

class StaffSignupForm extends Model
{
    public $email;
    public $password;
    public $repeatPassword;
    public $code;

    const STAFF = 8;
    const STAFF_NORMAL = 10;

    public function rules()
    {
        return [
            [['email', 'password', 'repeatPassword', 'code'], 'required'],
            [['email'], 'trim'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class],
            [['password'], 'string', 'length' => [2, 10]],
            [['code'], 'string', 'length' => 15],
            ['code', 'checkCode'],
            [['repeatPassword'], 'compare', 'compareAttribute' => 'password'],
        ];
    }


    public function checkCode($attribute, $params)
    {
        $client = Employee::find()->where(['hash' => $this->code])->one();

        if (!$client) {
            $this->addError($attribute, 'Вы ввели несуществующий код');
        }

    }


    public function save()
    {
        if ($this->validate()) {
            $client = Employee::find()->where(['hash' => $this->code])->one();
            $user = new User();

            $user->username = $client->user_name;
            $user->lastName = $client->last_name;
            $user->surname = $client->surname;
            $user->email = $this->email;
            $user->status = self::STAFF;
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = Yii::$app->security->generateRandomString(10);
            $user->created_at = $time = time();

            if ($user->save()) {
                $userId = Yii::$app->db->getLastInsertID();
                $client->user_id = $userId;
                $client->hash = null;
                $client->status = self::STAFF_NORMAL;
                $client->register_date = $time;

                if ($client->save()) {
                    return $userId;
                }

            }

        }
    }
}

