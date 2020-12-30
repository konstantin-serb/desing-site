<?php


namespace app\models\forms\assignment;

use app\models\Characteristic;
use Yii;
use yii\base\Model;

class AddAnswerCharacteristics extends Model
{
    public $answer;
    public $question_id;


    public function rules()
    {
        return [
            [['answer'], 'string'],
            [['question_id'],'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'answer' => 'Ответ',
        ];
    }


    public function save()
    {
        if($this->validate()) {
            $question = Characteristic::findOne($this->question_id);
            $question->answer = $this->answer;
            if (!$question->time_create) {
                $question->time_create = time();
            } else {$question->time_update = time();}
            $question->answer_person = Yii::$app->user->identity->getId();
            $question->status = Characteristic::NO_EDITED;
            if ($question->save()) {
                return true;
            }
        }

    }

}