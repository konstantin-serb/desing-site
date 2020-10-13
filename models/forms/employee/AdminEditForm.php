<?php


namespace app\models\forms\employee;

use yii\base\Model;
use app\models\Employee;

class AdminEditForm extends Model
{
    public $userName;
    public $lastName;
    public $surname;
    public $position;
    public $id;


    public function rules()
    {
        return [
            [['userName', 'surname'], 'required'],
            [['userName', 'surname', 'lastName'], 'string', 'length' => [2, 15]],
            [['position'], 'integer'],
        ];
    }




    public function save()
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

