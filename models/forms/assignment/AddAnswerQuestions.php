<?php


namespace app\models\forms\assignment;

use Yii;
use app\models\Question;
use yii\base\Model;

class AddAnswerQuestions extends Model
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
            $question = Question::findOne($this->question_id);
            $question->answer = $this->answer;
            if (!$question->time_create) {
                $question->time_create = time();
            } else {$question->time_update = time();}
            $question->answer_person = Yii::$app->user->identity->getId();
            $question->status = Question::NO_EDITED;
            if ($question->save()) {
                return true;
            }
        }

    }

}