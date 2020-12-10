<?php


namespace app\models\forms\template;


use Yii;
use yii\base\Model;
use app\models\TemplateContract;

class EditContractForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $status;
    public $executor;
    public $executorDirector;
    public $executorOrganization;
    public $description;
    public $contractCity;



    public function rules()
    {
        return [
            [['title'], 'string', 'length' => [3, 150]],
            [['title', 'content', 'executor'], 'required'],
            [['content', 'executor', 'description', 'contractCity',
            'executorDirector', 'executorOrganization'], 'string'],
            [['status'], 'integer'],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $template = TemplateContract::findOne($this->id);
            $template->title = $this->title;
            $template->executor = $this->executor;
            $template->contractCity = $this->contractCity;
            $template->content = $this->content;
            $template->description = $this->description;
            $template->executorOrganization = $this->executorOrganization;
            $template->executorDirector = $this->executorDirector;
            $template->date_update = time();
            $template->status = 10;


            if ($template->save()) {
                return true;
            }
        }


    }




}















