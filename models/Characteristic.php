<?php

namespace app\models;

use app\components\DateHelper;
use Yii;

/**
 * This is the model class for table "characteristic".
 *
 * @property int $id
 * @property int|null $assignment_id
 * @property int|null $sort
 * @property string|null $question
 * @property string|null $description
 * @property string|null $answer
 * @property string|null $validator
 * @property int|null $answer_person
 * @property int|null $time_create
 * @property int|null $time_update
 * @property int|null $status
 */
class Characteristic extends \yii\db\ActiveRecord
{
    const EDITED = 1;
    const NO_EDITED = 5;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristic';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assignment_id' => 'Assignment ID',
            'question' => 'Question',
            'description' => 'Description',
            'answer' => 'Answer',
            'answer_person' => 'Answer Person',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'status' => 'Status',
        ];
    }


    public function getDateTime()
    {
        if($this->time_update || $this->time_create) {
            if ($this->time_update) {
                $answer = 'Изменения внес: <b>'. $this->getUser(). '</b>&nbsp; &nbsp; ' . DateHelper::getDate($this->time_update). ' &nbsp; &nbsp;' . DateHelper::getTime($this->time_update);
            } else {
                $answer = 'Ответил: '. $this->getUser(). '&nbsp; &nbsp; ' . DateHelper::getDate($this->time_create). ' &nbsp; &nbsp;' . DateHelper::getTime($this->time_create);
            }
        } else {$answer = '';}

        return $answer;
    }


    public function getUser()
    {
        if ($this->answer_person) {
            $user = User::findOne($this->answer_person);
            return $user->getSurnamePlus();
        }
    }

}
