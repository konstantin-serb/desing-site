<?php


namespace app\models\forms\template;

use yii\base\Model;
use app\models\CharacteristicsTemplates;

class AddCharacteristicTemplateForm extends Model
{
    public $title;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'length' => [2-20]],
            [['title'], 'unique', 'targetClass' => CharacteristicsTemplates::class],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $template = new CharacteristicsTemplates();
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
            $template = CharacteristicsTemplates::findOne($id);
            $template->title = $this->title;
            if ($template->save()) {
                return true;
            }
        }
        return false;
    }


}