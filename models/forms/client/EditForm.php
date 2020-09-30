<?php


namespace app\models\forms\client;

use yii\base\Model;
use app\models\User;
use Yii;

class EditForm extends Model
{
    public $userName;
    public $lastName;
    public $surname;

    public function rules()
    {
        return [
            [['userName', 'surname'], 'required'],
            [['userName', 'surname', 'lastName'], 'string', 'length' => [2, 15]],

        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $user = User::findOne(Yii::$app->user->identity->id);
            $user->username = $this->userName;
            $user->lastName = $this->lastName;
            $user->surname = $this->surname;

            $user->updated_at = time();

            if ($user->save()) {
                return true;
            } else {
                return false;
            }
        }
    }
}

