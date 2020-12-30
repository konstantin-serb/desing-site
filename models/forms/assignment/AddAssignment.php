<?php


namespace app\models\forms\assignment;

use Yii;
use app\models\Assignment;
use yii\base\Model;

class AddAssignment extends Model
{
    public $projectId;
    public $address;
    public $customer;
    public $description;


    public function rules()
    {
        return [
            [['projectId', 'address', 'customer'], 'required'],
            [['projectId'], 'integer'],
            [['address', 'customer', 'description'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'address' => 'Адрес объекта',
            'customer' => 'ФИО заказчика',
            'description' => 'Краткое описание задания',
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $assignment = new Assignment();
            $assignment->project_id = $this->projectId;
            $assignment->customer = $this->customer;
            $assignment->address = $this->address;
            $assignment->description = $this->description;
            $assignment->time_create = time();

            if ($assignment->save()) {
                return Yii::$app->db->getLastInsertID();
            }

        }

    }

}