<?php


namespace app\models\forms\assignment;

use app\models\Question;
use app\models\templates\OneQuestionTemplate;
use Yii;
use app\models\Assignment;
use yii\base\Model;

class AdminAddQuestionsForm extends Model
{
    public $projectId;
    public $questionTemplateId;

    public function rules()
    {
        return [
            [['projectId', 'questionTemplateId'],
            'integer']
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $templates = OneQuestionTemplate::find()
                ->where(['template_id' => $this->questionTemplateId])
                ->orderBy('sort')->all();

            $assignment = Assignment::find()->where(['project_id' => $this->projectId])->one();
            foreach ($templates as $item) {
                $forClientQuestion = new Question();
                $forClientQuestion->question = $item->question;
                $forClientQuestion->sort = $item->sort;
                $forClientQuestion->description = $item->description;
                $forClientQuestion->assignment_id = $assignment->id;
                $forClientQuestion->status = Question::EDITED;
                $forClientQuestion->save();
            }
            return true;
        }


    }

}