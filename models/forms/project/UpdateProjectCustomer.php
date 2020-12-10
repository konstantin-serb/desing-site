<?php


namespace app\models\forms\project;


use Yii;
use yii\base\Model;
use app\models\Project;

class UpdateProjectCustomer extends Model
{
    public $date;
    public $length;
    public $customer;
    public $area;
    public $projectId;


    public function rules()
    {
        return [
            [['date'], 'string', 'length' => [2, 20]],
            [['length', 'customer', 'area', 'projectId'], 'integer'],
            [['date', 'length', 'customer', 'area'], 'required'],
        ];
    }

    public function update($id)
    {

        if($this->validate()) {
            $project = Project::findOne($id);
            $project->length = $this->length;
            $project->area = $this->area;
            $project->customer = $this->customer;
            $project->date_start = $this->date;

            if ($project->save()) {
                return true;
            }
        } return $this;
    }


}















