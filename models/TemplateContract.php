<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template_contract".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $picture
 * @property string|null $content
 * @property int|null $date_create
 * @property int|null $date_update
 * @property int|null $status
 * @property string|null $executor
 * @property string|null $description
 * @property string|null $executorOrganization
 * @property string|null $executorDirector
 * @property string|null $contractCity
 */
class TemplateContract extends \yii\db\ActiveRecord
{
    public $customerInfo = 'Фамилия заказчика';
    public $contractNom = 'Номер договора(берется из данных в проекте)';
    public $contractDate = 'Дата заключения договора(берется из данных в проекте)';
    public $areaInfo = 'Площадь дизайна';
    public $address = 'Адрес объекта';
    public $currency = 'Название валюты';
    public $priceInfo = 'Стоимость проекта';
    public $priceInfoWords = 'Цена словами';
    public $pathPrice = 'Части оплаты в процентах (из настроек проекта)';
    public $pathMoney = 'Части оплаты в деньгах (из настроек проекта)';
    public $pathInfo = 'Количество частей оплаты (Берется из настроек проекта)';
    public $lengthInfo = 'Длина разработки проекта (Берется из настроек проекта)';
    public $projectStart = 'Дата начала проекта';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template_contract';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'picture' => 'Picture',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'status' => 'Status',
            'executor' => 'Executor',
            'description' => 'Description',
        ];
    }

    public function generateText()
    {
        $text = $this->content;
        $text = $this->generateParth($text, '/{{contract_nomer}}/', $this->addTags($this->contractNom));
        $text = $this->generateParth($text, '/{{city}}/', $this->addTags($this->contractCity));
        $text = $this->generateParth($text, '/{{contract_date}}/', $this->addTags($this->contractDate));
        $text = $this->generateParth($text, '/{{customer}}/', $this->addTags($this->customerInfo));
        $text = $this->generateParth($text, '/{{currency}}/', $this->addTags($this->currency));
        $text = $this->generateParth($text, '/{{organisation}}/', $this->addTags($this->executorOrganization));
        $text = $this->generateParth($text, '/{{director}}/', $this->addTags($this->executorDirector));
        $text = $this->generateParth($text, '/{{area}}/', $this->addTags($this->areaInfo));
        $text = $this->generateParth($text, '/{{address}}/', $this->addTags($this->address));
        $text = $this->generateParth($text, '/{{cost-number}}/', $this->addTags($this->priceInfo));
        $text = $this->generateParth($text, '/{{cost-words}}/', $this->addTags($this->priceInfoWords));
        $text = $this->generateParth($text, '/{{pathPrice}}/', $this->addTags($this->pathInfo));
        $text = $this->generateParth($text, '/{{path-price}}/', $this->addTags($this->pathPrice));
        $text = $this->generateParth($text, '/{{path-money}}/', $this->addTags($this->pathMoney));
        $text = $this->generateParth($text, '/{{length}}/', $this->addTags($this->lengthInfo));
        $text = $this->generateParth($text, '/{{contract_start}}/', $this->addTags($this->projectStart));

        return $text;
    }


    private function generateParth($text, $pattern, $past)
    {
        return preg_replace($pattern, $past, $text);
    }


    private function addTags($data)
    {
        $startTag = '<span class="colorBlue">';
        $endTag = '</span>';

        return $startTag . $data . $endTag;
    }
}
