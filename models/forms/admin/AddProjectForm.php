<?php


namespace app\models\forms\admin;


use yii\base\Model;

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
            [['dateStart'], 'safe'],
        ];
    }


}















