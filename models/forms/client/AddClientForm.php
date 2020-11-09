<?php


namespace app\models\forms\client;

use Yii;
use yii\base\Model;
use app\models\Clients;

class AddClientForm extends Model
{
    const CLIENT_UNDEFORMED = 9;

    public $userName;
    public $lastName;
    public $surname;
//    public $hash;
//    public $created_at;


    public function rules()
    {
        return [
            [['userName', 'surname'], 'required'],
            [['userName', 'lastName', 'surname'], 'trim'],
            [['userName', 'lastName', 'surname'], 'string', 'min' => 2, 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'userName' => 'Имя',
            'lastName' => 'Отчество',
            'surname' => 'Фамилия',

        ];
    }


    public function save()
    {

        if($this->validate()) {
            $client = new Clients();

            $client->user_name = $this->userName;
            $client->last_name = $this->lastName;
            $client->surname = $this->surname;
            $client->hash = Yii::$app->security->generateRandomString(15);
            $client->created_at = time();
            $client->status = self::CLIENT_UNDEFORMED;

            if ($client->save()) {
                $client->id = Yii::$app->db->getLastInsertID();
                return $client;
            } else {
                return false;
            }
        }
    }


    public function value()
    {
        $array = Clients::find()->orderBy('id desc')->all();

        $value = '';

        foreach($array as $item) {
            $value .= '<option value="'.$item->id.'">'
                .$item->surname.' '.$item->user_name. ' ' . $item->last_name
                .'</option>';
        }

        return $value;
    }

}




















