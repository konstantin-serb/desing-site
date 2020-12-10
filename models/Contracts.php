<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contracts".
 *
 * @property int $id
 * @property int|null $projectId
 * @property int|null $sort
 * @property string|null $title
 * @property string|null $content
 * @property string|null $customer
 * @property int|null $date_create
 * @property int|null $date_update
 * @property string|null $executor_info
 * @property int|null $area
 * @property string|null $address
 * @property int|null $price_numeral
 * @property int|null $parts
 * @property string|null $price_words
 * @property float|null $price_p1
 * @property float|null $price_p2
 * @property float|null $price_p3
 * @property float|null $price_p4
 * @property float|null $price_p5
 * @property float|null $result1
 * @property float|null $result2
 * @property float|null $result3
 * @property float|null $result4
 * @property float|null $result5
 * @property int|null $length
 * @property string|null $customer_info
 * @property string|null $executor_organization
 * @property string|null $executor_director
 * @property string|null $contract_nom
 * @property string|null $contract_city
 * @property string|null $contract_date
 * @property string|null $contract_start
 * @property string|null $currency
 */
class Contracts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contracts';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'projectId' => 'Project ID',
            'sort' => 'Sort',
            'title' => 'Title',
            'content' => 'Content',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'executor_info' => 'Executor Info',
            'area' => 'Area',
            'address' => 'Address',
            'price_numeral' => 'Price Numeral',
            'parts' => 'Parts',
            'price_words' => 'Price Words',
            'price_p1' => 'Price P1',
            'price_p2' => 'Price P2',
            'price_p3' => 'Price P3',
            'price_p4' => 'Price P4',
            'price_p5' => 'Price P5',
            'result1' => 'Result1',
            'result2' => 'Result2',
            'result3' => 'Result3',
            'result4' => 'Result4',
            'result5' => 'Result5',
            'length' => 'Length',
            'customer_info' => 'Customer Info',
            'executor_organization' => 'Executor Organization',
            'executor_director' => 'Executor Director',
            'contract_nom' => 'Contract Nom',
            'contract_city' => 'Contract City',
            'contract_date' => 'Contract Date',
            'contract_start' => 'Contract Start',
            'currency' => 'Currency',
        ];
    }


    public function generateText()
    {
        $text = $this->content;
        $text = $this->generateParth($text, '/{{contract_nomer}}/', $this->addTags($this->contract_nom));
        $text = $this->generateParth($text, '/{{city}}/', $this->addTags($this->contract_city));
        $text = $this->generateParth($text, '/{{contract_date}}/', $this->addTags($this->contract_date));
        $text = $this->generateParth($text, '/{{contract_start}}/', $this->addTags($this->contract_start));
        $text = $this->generateParth($text, '/{{customer}}/', $this->addTags($this->customer));
        $text = $this->generateParth($text, '/{{organisation}}/', $this->addTags($this->executor_organization));
        $text = $this->generateParth($text, '/{{director}}/', $this->addTags($this->executor_director));
        $text = $this->generateParth($text, '/{{area}}/', $this->addTags($this->area));
        $text = $this->generateParth($text, '/{{address}}/', $this->addTags($this->address));
        $text = $this->generateParth($text, '/{{cost-number}}/', $this->addTags($this->price_numeral));
        $text = $this->generateParth($text, '/{{cost-words}}/', $this->addTags($this->price_words));
        $text = $this->generateParth($text, '/{{currency}}/', $this->addTags($this->currency));
        $text = $this->generateParth($text, '/{{pathPrice}}/', $this->addTags($this->countPart()));
        $text = $this->generateParth($text, '/{{path-price}}/', $this->addTags($this->part()));
        $text = $this->generateParth($text, '/{{path-money}}/', $this->addTags($this->moneyPart()));
        $text = $this->generateParth($text, '/{{length}}/', $this->addTags($this->length));


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

    private function countPart()
    {
        $count = 0;
        for ($i=1; $i<6; $i++) {
            $index = 'price_p' . $i;
            if ($this->$index) {
                $count = $count + 1;
            }
        }
        return $count;
    }

    private function part()
    {
        $string = '';
        for ($i=1; $i<6; $i++) {
            $index = 'price_p' . $i;
            if ($this->$index) {
                $string .= $this->$index . '%, ';
            }
        }
        $string = mb_substr($string, 0, -2, 'utf-8');
        return $string;
    }

    private function moneyPart()
    {
        $string = '';
        for ($i=1; $i<6; $i++) {
            $index = 'result' . $i;
            if ($this->$index) {
                $string .= $this->$index .' '. $this->currency .', ';
            }
        }
        $string = mb_substr($string, 0, -2, 'utf-8');
        return $string;
    }
}
