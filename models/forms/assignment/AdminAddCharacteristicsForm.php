<?php


namespace app\models\forms\assignment;

use app\models\Characteristic;
use app\models\OneCharacteristicTempate;
use app\models\Question;
use app\models\templates\OneQuestionTemplate;
use Yii;
use app\models\Assignment;
use yii\base\Model;

class AdminAddCharacteristicsForm extends Model
{
    public $projectId;
    public $characteristicTemplateId;

    public function rules()
    {
        return [
            [['projectId', 'characteristicTemplateId'], 'integer']
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $templates = OneCharacteristicTempate::find()
                ->where(['template_id' => $this->characteristicTemplateId])
                ->orderBy('sort')->all();

            $assignment = Assignment::find()->where(['project_id' => $this->projectId])->one();
            foreach ($templates as $item) {
                $forClientQuestion = new Characteristic();
                $forClientQuestion->question = $item->question;
                $forClientQuestion->sort = $item->sort;
                $forClientQuestion->description = $item->description;
                $forClientQuestion->assignment_id = $assignment->id;
                $forClientQuestion->status = Characteristic::EDITED;
                $forClientQuestion->save();
            }
            return true;
        }


    }

}