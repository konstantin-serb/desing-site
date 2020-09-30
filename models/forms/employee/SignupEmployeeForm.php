<?php


namespace app\models\forms\employee;

use Yii;
use yii\base\Model;
use app\models\Employee;


class SignupEmployeeForm extends Model
{
    const STAFF_UNDEFORMED = 9;

    public $userName;
    public $lastName;
    public $surname;
    public $position;
    public $info;



    public function rules()
    {
        return [
            [['userName', 'surname'], 'required'],
            [['userName', 'lastName', 'surname'], 'trim'],
            [['userName', 'lastName', 'surname'], 'string', 'min' => 2, 'max' => 15],
            [['position'], 'integer'],
            [['info'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'userName' => 'Имя',
            'lastName' => 'Отчество',
            'surname' => 'Фамилия',
            'info' => 'Информация о сотруднике',

        ];
    }


    public function save()
    {

        if($this->validate()) {
            $staff = new Employee();
            $staff->user_name = $this->userName;
            $staff->last_name = $this->lastName;
            $staff->surname = $this->surname;
            $staff->info = $this->info;
            $staff->position = $this->position;
            $staff->hash = Yii::$app->security->generateRandomString(15);
            $staff->create_at = time();
            $staff->status = self::STAFF_UNDEFORMED;

            if ($staff->save()) {
                return true;
            }
        }
    }

}

