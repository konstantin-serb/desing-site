<?php


namespace app\models\forms;

use yii\base\Model;
use app\models\Clients;
use app\models\User;
use Yii;

class AdminEditForm extends Model
{
    public $userName;
    public $lastName;
    public $surname;
    public $id;

    const CLIENT = 9;
    const CLIENT_NORMAL = 10;

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
            $client = Clients::findOne($this->id);
            $client->user_name = $this->userName;
            $client->last_name = $this->lastName;
            $client->surname = $this->surname;

            if ($client->save()) {
                return true;
            } else {
                return false;
            }
        }


    }
}

