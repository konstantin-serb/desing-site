<?php


namespace app\models\forms\stage;

use yii\base\Model;
use app\models\Stage;

class AddStageForm extends Model
{
    public $projectId;
    public $number;
    public $title;
    public $date;
    public $length;


    public function rules()
    {
        return [
            [['number', 'length', 'projectId'], 'integer'],
            [['title'], 'string', 'min' => 3, 'max' =>250],
            [['title'], 'unique', 'targetClass' => Stage::class],
            [['title', 'number'], 'required'],
            [['date'], 'string', 'length' => [3,12]],

        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $stage = new Stage();
            $stage->project_id = $this->projectId;
            $stage->number = $this->number;
            $stage->title = $this->title;
            $stage->start = strtotime($this->date);
            $stage->date_create = time();
            $stage->length = $this->length;
            $stage->date_create = $this->date;
            $stage->status = 1;


            if($stage->save()) {
                return [
                    'success' => true,
                    'message' => 'Стадия добавлена в базу данных',
                ];
            }
        }
        else {
            return $this->errors;
        }
    }


    private function getStages($project_id)
    {
        $stages = Stage::find()->where(['project_id'])->orderBy('number');


    }

}