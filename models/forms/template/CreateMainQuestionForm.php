<?php


namespace app\models\forms\template;

use app\models\Question;
use app\models\templates\OneQuestionTemplate;
use app\models\templates\QuestionsTemplates;
use yii\base\Model;

class CreateMainQuestionForm extends Model
{
    public $question;
    public $description;
    public $templateId;
    public $sort;

    public function rules()
    {
        return [
            [['templateId', 'sort'], 'integer'],
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
            $newQuestion = new OneQuestionTemplate();
            $newQuestion->question = $this->question;
            $newQuestion->description = $this->description;
            $newQuestion->template_id = $this->templateId;

            $allQuestions = OneQuestionTemplate::find()
                ->where(['template_id' => $this->templateId])
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
            $questionThis = OneQuestionTemplate::findOne($id);
            $question = OneQuestionTemplate::findOne($id);
            $question->question = $this->question;
            $question->description = $this->description;
            $question->sort = $this->sort;

            $questionOld = OneQuestionTemplate::find()
                ->where(['template_id' => $question->template_id])
                ->andWhere(['sort' => $this->sort])->one();

            $questionOld->sort = $questionThis->sort;
            $questionOld->save();

            if ($question->save()) {
                $questions = OneQuestionTemplate::find()
                    ->where(['template_id' => $question->template_id])
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