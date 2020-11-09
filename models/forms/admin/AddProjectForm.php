<?php


namespace app\models\forms\admin;


use yii\base\Model;
use app\models\Project;

class AddProjectForm extends Model
{
    public $projectId;
    public $nameProject;
    public $dateStart;
    public $customer;
    public $length;
    public $area;
    public $city;
    public $image;
    public $priceDigital;
    public $priceWords;
    public $currency;
    public $pricePart1;
    public $pricePart2;
    public $pricePart3;
    public $pricePart4;
    public $pricePart5;
//    public $assignment;
//    public $contract;
    public $status;


    public function rules()
    {
        return [
            [['projectId', 'nameProject', 'length', 'dateStart'], 'required'],
            [['dateStart'], 'string'],
            [['projectId'], 'string', 'length' => [5, 20]],
            [['customer', 'length', 'area', 'city', 'priceDigital',
                'currency', 'status'], 'integer'],
        [['pricePart1', 'pricePart2', 'pricePart3', 'pricePart4', 'pricePart5'], 'integer'],
            [['nameProject', 'priceWords'], 'string', 'length' => [5, 256]],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $project = new Project();
            $project->project_id = $this->projectId;
            $project->nameProject = $this->nameProject;
            $project->date_start = $this->dateStart;
            $project->customer = $this->customer;
            $project->length = $this->length;
            $project->area = $this->area;
            $project->city = $this->city;
            $project->image = $this->image;
            $project->price_digital = $this->priceDigital;
            $project->price_words = $this->priceWords;
            $project->price_p1 = $this->pricePart1;
            $project->price_p2 = $this->pricePart2;
            $project->price_p3 = $this->pricePart3;
            $project->price_p4 = $this->pricePart4;
            $project->price_p5 = $this->pricePart5;
            $project->status = $this->status;
            $project->time_create = time();
            $project->project_status = $project::STATUS_UNDERFILLED;

            if ($project->save()) {
                return true;
            }
        }
    }


}















