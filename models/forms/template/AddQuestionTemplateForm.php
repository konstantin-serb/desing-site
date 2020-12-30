<?php


namespace app\models\forms\template;

use app\models\templates\QuestionsTemplates;
use yii\base\Model;

class AddQuestionTemplateForm extends Model
{
    public $title;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'length' => [2-20]],
            [['title'], 'unique', 'targetClass' => QuestionsTemplates::class],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $template = new QuestionsTemplates();
            $template->title = $this->title;
            if ($template->save()) {
                return true;
            }
        }
        return false;
    }


    public function update($id)
    {
        if ($this->validate()) {
            $template = QuestionsTemplates::findOne($id);
            $template->title = $this->title;
            if ($template->save()) {
                return true;
            }
        }
        return false;
    }


}