<?php


namespace app\models\forms\assignment;

use Yii;
use app\models\Assignment;
use yii\base\Model;

class UpdateAssignmentForm extends Model
{
    public $assignmentId;
    public $customerId;
    public $description;


    public function rules()
    {
        return [
            [['assignmentId', 'customerId'], 'required'],
            [['assignmentId', 'customerId'], 'integer'],
            [['description'], 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'description' => 'Текстовое описание задания',
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $assignment = Assignment::findOne($this->assignmentId);
            $assignment->customer = $this->customer;
            $assignment->description = $this->description;
            $assignment->time_update = time();

            if ($assignment->save()) {
                return true;
            }

        }

    }

}