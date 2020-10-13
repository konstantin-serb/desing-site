<?php


namespace app\models\forms\client;

use yii\base\Model;
use app\models\Clients;
use app\models\Employee;

class AdminEditForm extends Model
{
    public $userName;
    public $lastName;
    public $surname;
    public $id;


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


    public function saveEmployee()
    {
        if ($this->validate()) {
            $employee = Employee::findOne($this->id);
            $employee->user_name = $this->userName;
            $employee->last_name = $this->lastName;
            $employee->surname = $this->surname;

            if ($employee->save()) {
                return true;
            } else {
                return false;
            }
        }
    }



}

