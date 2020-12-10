<?php


namespace app\models\forms\project;

use app\models\Contracts;
use Yii;
use yii\base\Model;


class UpdateContractForm extends Model
{
    public $id;
    public $content;
    public $sort;
    public $executorInfo;
    public $address;
    public $currency;
    public $customer;
    public $priceWords;
    public $customerInfo;
    public $executor_organization;
    public $executor_director;
    public $contract_city;
    public $contract_start;
    public $contract_date;

    public function rules()
    {
        return [
            [['sort', 'id'], 'integer'],
            [['id', 'content', 'sort', 'executorInfo', 'address', 'currency', 'customer', 'priceWords',
                'customerInfo', 'executor_organization', 'executor_director', 'contract_city',
                'contract_date', 'contract_start'], 'required'],
            [['contract_date', 'contract_start', 'priceWords', 'currency', 'contract_city',
            'customer', 'executor_director'], 'string', 'length' => [2,100]],
            [['address', 'customerInfo', 'executor_organization', 'content'], 'string'],
        ];
    }

    public function save()
    {
        if($this->validate()) {
            $contract = Contracts::findOne($this->id);
            $contract->sort = $this->sort;
            $contract->contract_start = $this->contract_start;
            $contract->contract_date = $this->contract_date;
            $contract->currency = $this->currency;
            $contract->price_words = $this->priceWords;
            $contract->contract_city = $this->contract_city;
            $contract->address = $this->address;
            $contract->customer = $this->customer;
            $contract->executor_info = $this->executorInfo;
            $contract->customer_info = $this->customerInfo;
            $contract->executor_organization = $this->executor_organization;
            $contract->executor_director = $this->executor_director;
            $contract->content = $this->content;
            $contract->date_update = time();

            if ($contract->save()) {
                return true;
            }
        }
    }



}


