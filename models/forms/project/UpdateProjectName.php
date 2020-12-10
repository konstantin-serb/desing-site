<?php


namespace app\models\forms\project;


use Yii;
use yii\base\Model;
use app\models\Project;

class UpdateProjectName extends Model
{
    public $id;
    public $projectId;
    public $nameProject;


    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['projectId', 'nameProject'], 'required'],
            [['projectId'], 'string', 'length' => [5, 20]],
            [['nameProject'], 'string', 'length' => [5, 256]],
        ];
    }

    public function updateName()
    {

        if($this->validate()) {
            $project = Project::findOne($this->id);
            $project->project_id = $this->projectId;
            $project->nameProject = $this->nameProject;

            if ($project->save()) {
                return true;
            }
        } return $this;
    }


}















