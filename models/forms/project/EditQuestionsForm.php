<?php


namespace app\models\forms\project;

use app\models\Assignment;
use app\models\Question;
use yii\base\Model;

class EditQuestionsForm extends Model
{
    public $question;
    public $description;
    public $projectId;
    public $sort;

    public function rules()
    {
        return [
            [['projectId', 'sort'], 'integer'],
            [['question'], 'required'],
            [['question'], 'string', 'length' => [3,255]],
            [['description'], 'string', 'length' => [3, 500]],
        ];
    }


    public function attributeLabels()
    {
        return [
            'question' => 'Вопрос',
            'description' => 'Описание',
            'sort' => 'Номер сортировки',
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $newQuestion = new Question();
            $assignment = Assignment::find()->where(['project_id'=>$this->projectId])
                ->one();
            $assignmentId = $assignment->id;
            $newQuestion->question = $this->question;
            $newQuestion->description = $this->description;
            $newQuestion->assignment_id = $assignmentId;
            $newQuestion->status = Question::EDITED;

            $allQuestions = Question::find()
                ->where(['assignment_id' => $assignmentId])
                ->orderBy('sort')->count();
            $newQuestion->sort = $allQuestions + 1;

            if ($newQuestion->save()) {
                return true;
            }
        }

        return false;
    }


    public function update($id)
    {
        if ($this->validate()) {
            $questionThis = Question::findOne($id);
            $question = Question::findOne($id);
            $question->question = $this->question;
            $question->description = $this->description;
            $question->sort = $this->sort;

            $questionOld = Question::find()
                ->where(['sort' => $this->sort])->one();

            $questionOld->sort = $questionThis->sort;
            $questionOld->save();

            if ($question->save()) {
                $questions = Question::find()
                    ->where(['assignment_id' => $question->assignment_id])
                    ->orderBy('sort')->all();
                $sort = 0;
                foreach($questions as $oneItem) {
                    $sort = $sort + 1;
                    $oneItem->sort = $sort;
                    $oneItem->save();
                }
                return true;
            }
        }
    }

}