<?php


namespace app\models\forms\template;


use Yii;
use yii\base\Model;
use app\models\TemplateContract;

class AddContractCopyForm extends Model
{
    public $id;
    public $title;


    public function rules()
    {
        return [
            [['title'], 'string', 'length' => [3, 150]],
            [['title', 'id'], 'required'],
            [['title'], 'unique', 'targetClass' => TemplateContract::class],
            [['id'], 'integer'],

        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $oldTemplate = TemplateContract::findOne($this->id);
            $newTemplate = new TemplateContract();
            $newTemplate->title = $this->title;
            $newTemplate->executor = $oldTemplate->executor;
            $newTemplate->content = $oldTemplate->content;
            $newTemplate->description = $oldTemplate->description;
            $newTemplate->executorOrganization = $oldTemplate->executorOrganization;
            $newTemplate->executorDirector = $oldTemplate->executorDirector;
            $newTemplate->contractCity = $oldTemplate->contractCity;
            $newTemplate->date_create = $newTemplate->date_update = time();
            $newTemplate->status = 10;

            if ($newTemplate->save()) {
                return Yii::$app->db->getLastInsertID();
            }
        }


    }




}















