<?php


namespace app\models\forms\project;

use app\models\Project;
use yii\base\Model;


class EditCityForm extends Model
{
    public $id;
    public $city;


    public function rules()
    {
        return [
            [['id', 'city'], 'integer'],
            [['id', 'city'], 'required'],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $project = Project::findOne($this->id);
            $project->city = $this->city;
            $project->time_update = time();

            if ($project->save()) {
                return true;
            }
        }
    }

}