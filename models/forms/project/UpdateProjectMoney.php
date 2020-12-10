<?php


namespace app\models\forms\project;


use Yii;
use yii\base\Model;
use app\models\Project;

class UpdateProjectMoney extends Model
{
    public $projectId;
    public $sum;
    public $words;
    public $currency;
    public $path1;
    public $path2;
    public $path3;
    public $path4;
    public $path5;


    public function rules()
    {
        return [
            [['sum','words','currency'], 'required'],
            [['sum', 'projectId', 'currency'], 'integer'],
            [['words'], 'string'],
            [['path1', 'path2', 'path3', 'path4', 'path5'], 'number', 'min' => 0, 'max' => 100]
        ];
    }

    public function update($id)
    {

        if($this->validate()) {
            $project = Project::findOne($id);
            $project->price_digital = $this->sum;
            $project->price_words = $this->words;
            $project->currency = $this->currency;

            $calculate = new CalculateForm();
            $calculate->sum = $this->sum;
            $calculate->path1 = $this->path1;
            $calculate->path2 = $this->path2;
            $calculate->path3 = $this->path3;
            $calculate->path4 = $this->path4;
            $calculate->path5 = $this->path5;
            $result = $calculate->calculate();

            $project->price_p1 = $result['path1'];
            $project->price_p2 = $result['path2'];
            $project->price_p3 = $result['path3'];
            $project->price_p4 = $result['path4'];
            $project->price_p5 = $result['path5'];
            $project->result1 = $result['result1'];
            $project->result2 = $result['result2'];
            $project->result3 = $result['result3'];
            $project->result4 = $result['result4'];
            $project->result5 = $result['result5'];

            $project->time_update = time();

            if ($project->save()) {
                return true;
            }
        } return false;
    }


}















