<?php


namespace app\models\forms\project;


use app\models\Contracts;
use app\models\TemplateContract;
use yii\base\Model;
use app\models\Project;

class AddFromTemplateContractForm extends Model
{
    public $projectId;
    public $templateId;
    public $customer;
    public $dateContract;
    public $dateStart;
    public $address;
    public $currency;
    public $priceWords;
    public $customerInfo;



    public function rules()
    {
        return [
            [['projectId', 'templateId'], 'integer'],
            [['projectId', 'templateId', 'address', 'customer', 'dateContract', 'dateStart',
                'currency', 'priceWords', 'customerInfo'], 'required'],
            [['dateStart', 'dateContract', 'customer', 'priceWords',
                'currency', 'customerInfo', 'address'], 'string'],
        ];
    }

    public function save()
    {
        if($this->validate()) {
            $project = Project::findOne($this->projectId);
            $template = TemplateContract::findOne($this->templateId);
            $nomContracts = Contracts::find()->where(['projectId' => $this->projectId])
                ->count();
            $contract = new Contracts();

            $contract->projectId = $this->projectId;
            $contract->sort = $nomContracts + 1;
            $contract->title = $this->address. ' ('.$project->client->surname.' '.$project->client->user_name.')';
            $contract->content = $template->content;
            $contract->date_create = time();
            $contract->date_update = $contract->date_create;
            $contract->executor_info = $template->executor;
            $contract->area = $project->area;
            $contract->length = $project->length;
            $contract->address = $this->address;
            $contract->price_numeral = $project->price_digital;
            $contract->parts = $this->partsCount();
            $contract->price_words = $this->priceWords;
            $contract->price_p1 = $project->price_p1;
            $contract->price_p2 = $project->price_p2;
            $contract->price_p3 = $project->price_p3;
            $contract->price_p4 = $project->price_p4;
            $contract->price_p5 = $project->price_p5;
            $contract->result1 = $project->result1;
            $contract->result2 = $project->result2;
            $contract->result3 = $project->result3;
            $contract->result4 = $project->result4;
            $contract->result5 = $project->result5;
            $contract->customer_info = $this->customerInfo;
            $contract->customer = $this->customer;
            $contract->executor_organization = $template->executorOrganization;
            $contract->executor_director = $template->executorDirector;
            $contract->contract_nom = $project->project_id;
            $contract->contract_city = $template->contractCity;
            $contract->contract_date = $this->dateContract;
            $contract->contract_start = $this->dateStart;
            $contract->currency = $this->currency;

            if ($contract->save()) {
                return true;
            }
            return false;

        }
    }


    private function partsCount()
    {
        $project = Project::findOne($this->projectId);
        $path = 0;
       for($i=1; $i<6; $i++) {
           $word = 'price_p'.$i;
           if ($project->$word) {$path = $path + 1;}
       }

       return $path;

    }


}















