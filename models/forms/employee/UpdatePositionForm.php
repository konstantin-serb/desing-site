<?php


namespace app\models\forms\employee;

use Yii;
use yii\base\Model;
use app\models\Employee;


class UpdatePositionForm extends Model
{

    public $position;
    public $id;

    public function rules()
    {
        return [
            [['position'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'position' => 'Должность',
        ];
    }


    public function save()
    {
        if($this->validate()) {
            $staff = Employee::findOne($this->id);
            $staff->position = $this->position;

            if ($staff->save()) {
                return true;
            }
        }
    }

}

