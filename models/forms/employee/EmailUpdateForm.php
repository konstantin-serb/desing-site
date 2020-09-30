<?php


namespace app\models\forms\employee;

use app\models\User;
use yii\base\Model;

class EmailUpdateForm extends Model
{

    public $email;



    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class],


        ];
    }


    public function save($id)
    {
        if ($this->validate()) {
            $user = User::findOne($id);
            $user->email = $this->email;
            $user->updated_at = time();
            if ($user->save()) {
                return true;
            }
        }
    }




}

