<?php


namespace app\models\forms\admin;

use app\models\forms\project\CalculateForm;
use Yii;
use yii\base\Model;
use app\models\Project;

class AddProjectForm extends Model
{
    public $id;
    public $projectId;
    public $nameProject;
    public $address;
    public $dateStart;
    public $customer;
    public $length;
    public $area;
    public $city;
    public $addCity;
    public $image;
    public $imageMin;
    public $priceDigital;
    public $priceWords;
    public $currency;
    public $pricePart1;
    public $pricePart2;
    public $pricePart3;
    public $pricePart4;
    public $pricePart5;


    const STATUS_UNDEFORMED = 9;

    public function attributeLabels()
    {
        return [
            'pricePart1' => 'Часть 1',
            'pricePart2' => 'Часть 2',
            'pricePart3' => 'Часть 3',
            'pricePart4' => 'Часть 4',
            'pricePart5' => 'Часть 5',
            'address' => 'Адрес проекта',

        ];
    }


    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['projectId', 'nameProject', 'length', 'dateStart', 'address'], 'required'],
            [['dateStart', 'addCity', 'address'], 'string'],
            [['projectId'], 'string', 'length' => [5, 20]],
            [['customer', 'length', 'area', 'city', 'priceDigital',
                'currency'], 'integer'],
        [['pricePart1', 'pricePart2', 'pricePart3', 'pricePart4', 'pricePart5'], 'integer'],
        [['pricePart1', 'pricePart2', 'pricePart3', 'pricePart4', 'pricePart5'], 'number', 'min'=>0, 'max' => 100],
            [['nameProject', 'priceWords'], 'string', 'length' => [5, 256]],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $project = new Project();
            $project->project_id = $this->projectId;
            $project->nameProject = $this->nameProject;
            $project->address = $this->address;
            $project->date_start = $this->dateStart;
            $project->customer = $this->customer;
            $project->length = $this->length;
            $project->area = $this->area;
            $project->city = $this->city;
            $project->currency = $this->currency;
            $project->image = $this->image;
            $project->image_min = $this->imageMin;
            $project->price_digital = $this->priceDigital;
            $project->price_words = $this->priceWords;

            $calculate = new CalculateForm();
            $calculate->sum = $this->priceDigital;
            $calculate->path1 = $this->pricePart1;
            $calculate->path2 = $this->pricePart2;
            $calculate->path3 = $this->pricePart3;
            $calculate->path4 = $this->pricePart4;
            $calculate->path5 = $this->pricePart5;
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

            $project->time_create =  $project->time_update = time();
            $project->project_status = $project::STATUS_UNDERFORMED;

            if ($project->save()) {
                return Yii::$app->db->getLastInsertID();
            }
        }
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















