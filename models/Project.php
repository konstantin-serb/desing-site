<?php

namespace app\models;


use Yii;
use app\models\Clients;
use app\models\Currency;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $project_id
 * @property string|null $nameProject
 * @property string|null $date_start
 * @property int|null $customer
 * @property int|null $length
 * @property float|null $area
 * @property int|null $city
 * @property string|null $image
 * @property string|null $image_min
 * @property int|null $price_digital
 * @property string|null $price_words
 * @property int|null $currency
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
 * @property int|null $status
 * @property int|null $project_status
 * @property int|null $time_create
 * @property int|null $time_update
 * @property string|null $tz
 * @property string|null $contract
 */
class Project extends \yii\db\ActiveRecord
{
    const STATUS_UNDERFORMED = 9;

    /**public const
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'nameProject' => 'Name Project',
            'date_start' => 'Date Start',
            'customer' => 'Customer',
            'length' => 'Length',
            'area' => 'Area',
            'city' => 'City',
            'image' => 'Image',
            'price_digital' => 'Price Digital',
            'price_words' => 'Price Words',
            'currency' => 'Currency',
            'price_p1' => 'Часть 1',
            'price_p2' => 'Price P2',
            'price_p3' => 'Price P3',
            'price_p4' => 'Price P4',
            'price_p5' => 'Price P5',
            'status' => 'Status',
            'project_status' => 'Project Status',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'tz' => 'Technical task',
            'contract' => 'Contract',
        ];
    }


    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'customer']);
    }


    public function getCity_name()
    {
        return $this->hasOne(City::class, ['id' => 'city']);
    }


    public function getValut()
    {

        return $this->hasOne(Currency::class, ['id' => 'currency']);

    }


    public function getDate($stamp)
    {
        $strTime = strtotime($stamp);

        $_monthsList = array(".01." => "января", ".02." => "февраля",
            ".03." => "марта", ".04." => "апреля", ".05." => "мая", ".06." => "июня",
            ".07." => "июля", ".08." => "августа", ".09." => "сентября",
            ".10." => "октября", ".11." => "ноября", ".12." => "декабря");

        $data = date('d', $strTime) . ' ' . $_monthsList[date('.m.', $strTime)]
            . ' ' . date('Y', $strTime) . 'г.';

        return $data;
    }

    public function getImage()
    {
        if ($this->image) {
            return '/files/uploads/' . $this->image;
        } else {
            return '/files/uploads/project/no-image.jpg';
        }
    }

    public function getMiniatur()
    {
        if ($this->image) {
            return '/files/uploads/' . $this->image_min;
        } else {
            return '/files/uploads/project/min/no-image.jpg';
        }
    }


    public function getStringPrice()
    {
        $string = [];

        for ($i = 1; $i < 6; $i++) {
            $word = 'price_p';
            $index = $word . $i;
            if (!$this->$index == 0) {
                $string[$i] = $this->$index . '%' . '&nbsp &nbsp';
            }
        }

        return implode($string);
    }

}
